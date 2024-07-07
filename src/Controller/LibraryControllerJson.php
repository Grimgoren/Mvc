<?php

namespace App\Controller;

use App\Entity\Library;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\LibraryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibraryControllerJson extends AbstractController
{
    /**
     * Route to show all the books in the library as Json.
     */
    #[Route('api/library/books', name: 'library_show_all')]
    public function showAllLibraryItems(LibraryRepository $libraryRepository): Response
    {
        $libraryItem = $libraryRepository->findAll();

        $response = $this->json($libraryItem);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT
        );
        return $response;
    }

    /**
     * Route to show a book by id from the library.
     */
    #[Route('/library/show/{id}', name: 'library_by_id')]
    public function showLibraryItemById(
        LibraryRepository $libraryRepository,
        int $id
    ): Response {
        $libraryItem = $libraryRepository
            ->find($id);

        return $this->json($libraryItem);
    }

    /**
     * Route to show a book based on isbn from the library.
     */
    #[Route('api/library/book/{isbn}', name: 'library_by_isbn')]
    public function showLibraryItemByISBN(
        LibraryRepository $libraryRepository,
        string $isbn
    ): Response {
        $libraryItem = $libraryRepository->findOneBy(['isbn' => $isbn]);

        return $this->json($libraryItem);
    }

    /*

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

    */
}
