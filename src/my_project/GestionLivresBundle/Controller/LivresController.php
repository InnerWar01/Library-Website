<?php

namespace my_project\GestionLivresBundle\Controller;

use \my_project\GestionLivresBundle\Entity\Book;
use my_project\GestionLivresBundle\Services\MarkdownTransformer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\Dump\Container;

class LivresController extends Controller
{
    /**
     * @Route("/book/new")
     */
    public function newAction()
    {
        $book = new Book();
        $book->setIsbn(1);
        $book->setTitle('The Book Thief');
        $book->setPrice(7.5);

        $em = $this->getDoctrine()->getManager();
        $em->persist($book);
        $em->flush();

        return new Response('<html><body>Book created!</body></html>');
    }

    /**
     * @Route("/book/listBooks")
     */

    public function listAction() {
        $em = $this->getDoctrine()->getManager();

        dump($em->getRepository('my_project\GestionLivresBundle\Entity\Book'));
        $books = $em->getRepository('my_project\GestionLivresBundle\Entity\Book')
            ->listBooksOrderedByPrice();

        return $this->render('my_projectGestionLivresBundle:livres:list.html.twig', [
            'books' => $books
        ]);
    }

    /**
    * @Route("/book/{isbn}", name="book_show")
    */

    public function getBooksAction($isbn)
    {
        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('my_project\GestionLivresBundle\Entity\Book')
            ->findOneBy(['isbn' => $isbn]);

        if (!$book) {
            throw $this->createNotFoundException("Book Not Found");
        }

        $markdownTransformer = $this->get('app.markdown_transformer');

        $title = $markdownTransformer->parse($book->getTitle());

        return $this->render('my_projectGestionLivresBundle:livres:show.html.twig', array(
            'book' => $book,
            'title' => $title,
        ));
    }
}
