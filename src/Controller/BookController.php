<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/book", name="book.")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="get")
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
     * @Route("/add", name="add")
     * @return Response
     */
    public function add()
    {
        return $this->render('book/add.html.twig', [
            'active' => 'add'
        ]);
    }
}
