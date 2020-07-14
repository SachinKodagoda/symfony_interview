<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Category;
use App\Form\BookType;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/book", name="book.")
 */
class BookController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     * @param BookRepository $bookRepository
     * @param Request $request
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function index(BookRepository $bookRepository, Request $request, CategoryRepository $categoryRepository)
    {
        $category_id = $request->query->get('category');
        $active = 'home';
        $books = null;
        if(isset($category_id) && !empty($category_id)){
            $books = $categoryRepository->find($category_id)->getBooks();
            $active = $category_id;
        }else{
            $books = $bookRepository->findAll();
        }
        return $this->render('book/index.html.twig', [
            'books' => $books,
            'active' => $active,
            'categories' => $categoryRepository->findAll(),
            'cart_count' => 0
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
     * @param Request $request
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function store(Request $request, BookRepository $bookRepository)
    {
        $book = new Book();
//        $book->setAuthor();
//        $book->setAvailability();
//        $book->setDescription();
//        $book->setDiscount();
//        $book->setName();
//        $book->setIsbn();
//        $book->setImage();
//        $book->setPrice();
//        $book->setPublishedDate();
//        $book->setPublisher();
//        $book->setRating();
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($book);
//        $em->flush();
        return $this->redirect($this->generateUrl('book.index'));
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
            'book' => $book,
            'author' => $book->getAuthor(),
            'cart_count' => 0
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
     * @param $id
     * @param BookRepository $bookRepository
     * @return Response
     */
    public function destroy($id, BookRepository $bookRepository)
    {
        $book = $bookRepository->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();
        $this->addFlash('success', 'Book was successfully removed');
        return $this->redirect($this->generateUrl('book.index'));
    }

}
