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
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {
        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }

    #[Route("/library/landing-page", name: "library-page")]
    public function libraryPage(): Response
    {
        return $this->render('library/library.html.twig');
    }

    #[Route("/library/addBook", name: "library-addBook-page")]
    public function addBookPage(): Response
    {
        return $this->render('library/addBook.html.twig');
    }

    #[Route("/library/allBooks", name: "library-showAll-page")]
    public function showAllBooks(): Response
    {
        return $this->render('library/showAllBooks.html.twig');
    }

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

    #[Route('/library/create', name: 'library_create', methods: ['GET', 'POST'])]
    public function createLibraryItem(Request $request, ManagerRegistry $doctrine): Response
    {
        if ($request->isMethod('POST')) {
            $title = $request->request->get('title');
            $isbn = $request->request->get('isbn');
            $author = $request->request->get('author');
            $picture = $request->request->get('picture');
    
            if (!$title || !$isbn || !$author || !$picture) {
                return new Response('Missing required parameters', Response::HTTP_BAD_REQUEST);
            }
    
            $entityManager = $doctrine->getManager();
    
            $libraryItem = new Library();
            $libraryItem->setTitle($title);
            $libraryItem->setISBN($isbn);
            $libraryItem->setAuthor($author);
            $libraryItem->setPicture($picture);
    
            // tell Doctrine you want to (eventually) save the library item
            // (no queries yet)
            $entityManager->persist($libraryItem);
    
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
    
            return new Response('Saved new library item with id ' . $libraryItem->getId());
        }
    
        return $this->render('library/addBook.html.twig');
    }

    #[Route('/library/show', name: 'library_show_all')]
    public function showAllLibraryItems(LibraryRepository $libraryRepository): Response
    {
        $libraryItem = $libraryRepository->findAll();
    
        $response = $this->json($libraryItem);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    #[Route('/library/showHtml', name: 'library_show_all_html')]
    public function showAllLibraryItemsHtml(LibraryRepository $libraryRepository): Response
    {
        $libraryItems = $libraryRepository->findAll();

        return $this->render('library/showAllBooks.html.twig', [
            'libraryItems' => $libraryItems,
        ]);
    }

    #[Route('/library/show/{id}', name: 'library_by_id')]
    public function showLibraryItemById(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $libraryItem = $libraryRepository
            ->find($id);
    
        return $this->json($libraryItem);
    }

    #[Route('/library/search', name: 'library_search_html', methods: ['GET', 'POST'])]
    public function showLibrarySearchHtml(Request $request, LibraryRepository $libraryRepository): Response
    {
        $libraryItems = [];

        if ($request->isMethod('POST')) {
            $searchIt = $request->request->get('search');

            if (!$searchIt) {
                return new Response('Missing required parameters', Response::HTTP_BAD_REQUEST);
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

    #[Route('/library/delete/{id}', name: 'library_delete_by_id')]
    public function deleteLibraryItemById(
        ManagerRegistry $doctrine,
        int $id
    ): Response {
        $entityManager = $doctrine->getManager();
        $libraryItem = $entityManager->getRepository(Library::class)->find($id);
    
        if (!$libraryItem) {
            throw $this->createNotFoundException(
                'No book found for id '.$id
            );
        }
    
        $entityManager->remove($libraryItem);
        $entityManager->flush();
    
        return $this->redirectToRoute('library_show_all');
    }

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
                'No book found for id '.$id
            );
        }
    
        $libraryItem->setPicture($picture);
        $entityManager->flush();
    
        return new Response('Updated library item picture with id ' . $libraryItem->getId());
        return $this->redirectToRoute('library_show_all');
    }

    #[Route('/library/{id}/update', name: 'library_edit', methods: ['GET', 'POST'])]
    public function editLibraryItem(
        Request $request, 
        ManagerRegistry $doctrine,
        int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $libraryItem = $entityManager->getRepository(Library::class)->find($id);
    
        if (!$libraryItem) {
            throw $this->createNotFoundException('No book found for id ' . $id);
        }
    
        if ($request->isMethod('POST')) {
            $title = $request->request->get('title');
            $isbn = $request->request->get('isbn');
            $author = $request->request->get('author');
            $picture = $request->request->get('picture');
    
            if (!$title || !$isbn || !$author || !$picture) {
                return new Response('Missing required parameters', Response::HTTP_BAD_REQUEST);
            }
    
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

    #[Route('/library/edit/{id}', name: 'library_show_edit_form', methods: ['POST'])]
    public function showEditForm(Request $request, int $id, LibraryRepository $libraryRepository): Response
    {
        $libraryItem = $libraryRepository->find($id);
    
        if (!$libraryItem) {
            throw $this->createNotFoundException('No book found for id ' . $id);
        }
    
        return $this->render('library/editDetails.html.twig', [
            'libraryItem' => $libraryItem,
        ]);
    }
}