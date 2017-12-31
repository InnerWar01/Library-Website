<?php

namespace my_project\GestionLivresBundle\Controller\Admin;

use my_project\GestionLivresBundle\Entity\Book;
use my_project\GestionLivresBundle\Forms\AjouterLivreFormType;
use my_project\GestionLivresBundle\Forms\SupprimerLivreForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 * @Route("/admin")
 */

class BookAdminController extends Controller
{
    /**
     * @Route("/book", name="admin_book_list")
     */
    public function indexAction()
    {
        $books = $this->getDoctrine()
            ->getRepository('my_project\GestionLivresBundle\Entity\Book')
            ->findAll();

        return $this->render('my_projectGestionLivresBundle:livres:listAdmin.html.twig', array(
            'books' => $books
        ));
    }

    /**
     * @Route("/book/new", name="admin_book_new")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(AjouterLivreFormType::class);

        //only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();
            $isbn=$book->getIsbn();
            $b=$this->getDoctrine()
                ->getRepository('my_project\GestionLivresBundle\Entity\Book')
                ->find($isbn);

            if($b!=null){
                $this->addFlash('success', 'Livre déjà existant');
                //return $this->redirectToRoute('admin_book_list');
            }
            else{
                $em = $this->getDoctrine()->getManager();
                $em->persist($book);
                $em->flush();

                $this->addFlash('success', 'Livre créé!');

            }

            return $this->redirectToRoute('admin_book_list');


        }
        return $this->render('my_projectGestionLivresBundle:livres:new.html.twig', [
            'bookForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/{isbn}/edit", name="admin_book_edit")
     */
    public function editAction(Request $request, Book $book)
    {
        $form = $this->createForm(AjouterLivreFormType::class, $book);

        //only handles data on POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();

            $isbn=$book->getIsbn();
            $b=$this->getDoctrine()
                ->getRepository('my_project\GestionLivresBundle\Entity\Book')
                ->find($isbn);
            if($b==null){
                $this->addFlash('success', 'Livre inexistant');
            }
            else{
                $em = $this->getDoctrine()->getManager();
                $em->persist($book);
                $em->flush();

                $this->addFlash('success', 'Livre édité!');
            }


            return $this->redirectToRoute('admin_book_list');
        }
        return $this->render('my_projectGestionLivresBundle:livres:edit.html.twig', [
            'bookForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/{isbn}/delete", name="admin_book_delete")
     */
    public function removeAction(Request $request, Book $book)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($book);
        $em->flush();

        $this->addFlash('success', 'Livre supprimé!');

        return $this->redirectToRoute('admin_book_list');
    }
}