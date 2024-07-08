<?php

namespace App\Controller;

use App\Entity\Library;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\LibraryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
    /**
     * Route to show controller message for the library.
     */
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {
        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }

    /**
     * Route to show the landingpage of the library.
     */
    #[Route("/library/landing-page", name: "library-page")]
    public function libraryPage(): Response
    {
        return $this->render('library/library.html.twig');
    }

    /**
     * Route to add a book to the library.
     */
    #[Route("/library/addBook", name: "library-addBook-page")]
    public function addBookPage(): Response
    {
        return $this->render('library/addBook.html.twig');
    }

    /*
    #[Route("/library/allBooks", name: "library-showAll-page")]
    public function showAllBooks(): Response
    {
        return $this->render('library/showAllBooks.html.twig');
    }
     */

    /**
     * Route to show details of a book.
     */
    #[Route("/library/detailsOfBook/{title}", name: "library-showDetails-page", methods: ['GET'])]
    public function showBookDetails(string $title, LibraryRepository $libraryRepository): Response
    {
        $libraryItems = $libraryRepository->createQueryBuilder('l')
            ->where('l.title = :title')
            ->setParameter('title', $title)
            ->getQuery()
            ->getResult();

        if (!$libraryItems) {
            return new Response('No book found with the title ' . $title, Response::HTTP_NOT_FOUND);
        }

        return $this->render('library/showDetails.html.twig', [
            'libraryItems' => $libraryItems,
        ]);
    }

    /**
     * Route to add a book to the library.
     */
    #[Route('/library/create', name: 'library_create', methods: ['GET', 'POST'])]
    public function createLibraryItem(Request $request, ManagerRegistry $doctrine): Response
    {
        if ($request->isMethod('POST')) {
            $title = $request->request->get('title');
            $isbn = $request->request->get('isbn');
            $author = $request->request->get('author');
            $picture = $request->request->get('picture');

            if (!$title || !$isbn || !$author || !$picture) {
                return $this->render('library/error.html.twig', [
                    'error_message' => 'Det saknas information'
                ], new Response('', Response::HTTP_BAD_REQUEST));
            }

            $entityManager = $doctrine->getManager();

            $libraryItem = new Library();
            $libraryItem->setTitle($title);
            $libraryItem->setISBN($isbn);
            $libraryItem->setAuthor($author);
            $libraryItem->setPicture($picture);

            $entityManager->persist($libraryItem);
            $entityManager->flush();

            return $this->redirectToRoute('library_show_all_html');
        }

        return $this->render('library/addBook.html.twig');
    }

    /**
     * Route to show all the books in the library.
     */
    #[Route('/library/showHtml', name: 'library_show_all_html')]
    public function showAllLibraryItemsHtml(LibraryRepository $libraryRepository): Response
    {
        $libraryItems = $libraryRepository->findAll();

        return $this->render('library/showAllBooks.html.twig', [
            'libraryItems' => $libraryItems,
        ]);
    }

    /**
     * Route to search for a book from the library.
     */
    #[Route('/library/search', name: 'library_search_html', methods: ['GET', 'POST'])]
    public function showLibrarySearchHtml(Request $request, LibraryRepository $libraryRepository): Response
    {
        $libraryItems = [];

        if ($request->isMethod('POST')) {
            $searchIt = $request->request->get('search');

            if (!$searchIt) {
                return new Response('Det saknas information', Response::HTTP_BAD_REQUEST);
            }

            $searchIt = trim($searchIt);

            $query = $libraryRepository->createQueryBuilder('l')
            ->where('l.title LIKE :searchIt')
            ->orWhere('l.author LIKE :searchIt')
            ->setParameter('searchIt', '%' . $searchIt . '%')
            ->getQuery();

            $libraryItems = $query->getResult();
        }

        return $this->render('library/showThisBook.html.twig', [
            'libraryItems' => $libraryItems,
        ]);
    }

    /*
    #[Route('/library/update/{id}/{picture}', name: 'library_update')]
    public function updateLibraryItem(
        ManagerRegistry $doctrine,
        int $id,
        string $picture
    ): Response {
        $entityManager = $doctrine->getManager();
        $libraryItem = $entityManager->getRepository(Library::class)->find($id);

        if (!$libraryItem) {
            throw $this->createNotFoundException(
                'No book found for id ' . $id
            );
        }

        $libraryItem->setPicture($picture);
        $entityManager->flush();

        return $this->redirectToRoute('library_show_all');
    }
     */

    private function findLibraryItem(ManagerRegistry $doctrine, int $id): ?Library
    {
        return $doctrine->getManager()->getRepository(Library::class)->find($id);
    }

    private function checkRequest(Request $request): ?Response
    {
        $title = $request->request->get('title');
        $isbn = $request->request->get('isbn');
        $author = $request->request->get('author');
        $picture = $request->request->get('picture');

        if (!$title || !$isbn || !$author || !$picture) {
            return new Response('Det saknas information', Response::HTTP_BAD_REQUEST);
        }
    return null;
    }

    /**
     * Route to the info about a book by the id library.
     */
    #[Route('/library/{id}/update', name: 'library_edit', methods: ['GET', 'POST'])]
    public function editLibraryItem(
        Request $request,
        ManagerRegistry $doctrine,
        int $id
    ): Response {

        $entityManager = $doctrine->getManager();
        $libraryItem = $this->findLibraryItem($doctrine, $id);

        if (!$libraryItem) {
            throw $this->createNotFoundException('Ingen bok hittades för ' . $id);
        }

        if ($request->isMethod('POST')) {
            $validationResult = $this->checkRequest($request);
    
            if ($validationResult !== null) {
                return $validationResult;
            }

            $title = $request->request->get('title');
            $isbn = $request->request->get('isbn');
            $author = $request->request->get('author');
            $picture = $request->request->get('picture');

            $libraryItem->setTitle($title);
            $libraryItem->setISBN($isbn);
            $libraryItem->setAuthor($author);
            $libraryItem->setPicture($picture);

            $entityManager->flush();

            return $this->redirectToRoute('library_show_all_html');
        }

        return $this->render('library/editBook.html.twig', [
            'libraryItem' => $libraryItem,
        ]);
    }

    /**
     * Route to the info about a book by the id library.
     */
    #[Route('/library/edit/{id}', name: 'library_show_edit_form', methods: ['POST', 'GET'])]
    public function showEditForm(int $id, LibraryRepository $libraryRepository): Response
    {
        $libraryItem = $libraryRepository->find($id);

        if (!$libraryItem) {
            return new Response('Ingen bok hittades för id ' . $id, Response::HTTP_BAD_REQUEST);
        }

        return $this->render('library/editDetails.html.twig', [
            'libraryItem' => $libraryItem,
        ]);
    }

    /**
     * Route delete a book from the library by it's id.
     */
    #[Route('/library/delete/{id}', name: 'library_delete', methods: ['POST', 'GET'])]
    public function libraryDelete(
        Request $request,
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $libraryItem = $entityManager->getRepository(Library::class)->find($id);

        if (!$libraryItem) {
            return new Response('Ingen bok hittades för id ' . $id, Response::HTTP_BAD_REQUEST);
        }

        if ($request->isMethod('POST')) {
            $entityManager->remove($libraryItem);
            $entityManager->flush();

            return $this->redirectToRoute('library_show_all_html');
        }

        return $this->render('library/editBook.html.twig', [
            'libraryItem' => $libraryItem,
        ]);
    }
}
