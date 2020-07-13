<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/book", name="book.")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function index(BookRepository $bookRepository)
    {

        $books = $bookRepository->findAll();

        return $this->render('book/index.html.twig', [
            'books' => $books,
            'active' => 'home'
        ]);
    }

    /**
     * @Route("/create", name="create", methods={"GET"})
     * @return Response
     */
    public function create()
    {
        return $this->render('book/create.html.twig', [
            'active' => 'create'
        ]);
    }

    /**
     * @Route("/", name="store", methods={"POST"})
     * @return Response
     */
    public function store()
    {
        return $this->render('book/create.html.twig', [
            'active' => 'add'
        ]);
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     * @param $id
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function show($id, BookRepository $bookRepository)
    {
        $book = $bookRepository->find($id);
        return $this->render('book/show.html.twig', [
            'book' => $book
        ]);
    }


    /**
     * @Route("/{id}/edit", name="edit", methods={"GET"})
     * @return Response
     */
    public function edit()
    {
        return $this->render('book/create.html.twig', [
            'active' => 'add'
        ]);
    }

    /**
     * @Route("/{id}", name="update", methods={"PUT"})
     * @return Response
     */
    public function update()
    {
        return $this->render('book/create.html.twig', [
            'active' => 'add'
        ]);
    }

    /**
     * @Route("/{id}", name="destroy", methods={"DELETE"})
     * @return Response
     */
    public function destroy()
    {
        return $this->render('book/create.html.twig', [
            'active' => 'add'
        ]);
    }

}
