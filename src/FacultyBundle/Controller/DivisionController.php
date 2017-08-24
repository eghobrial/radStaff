<?php

namespace FacultyBundle\Controller;

use FacultyBundle\FacultyBundle;
use FacultyBundle\Entity\Division;
use FacultyBundle\Entity\Faculty;
use FacultyBundle\Repository\FacultyRepository;
use FacultyBundle\Repository\DivisionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Division controller.
 *
 * @Route("division")
 */
class DivisionController extends Controller
{
    /**
     * Lists all division entities.
     *
     * @Route("/", name="division_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $divisions = $em->getRepository('FacultyBundle:Division')->findAll();

        return $this->render('division/index.html.twig', array(
            'divisions' => $divisions,
        ));
    }



    /**
     * Creates a new division entity.
     *
     * @Route("/new", name="division_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $division = new Division();
        $form = $this->createForm('FacultyBundle\Form\DivisionType', $division);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($division);
            $em->flush();

            return $this->redirectToRoute('division_show', array('id' => $division->getId()));
        }

        return $this->render('division/new.html.twig', array(
            'division' => $division,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a division entity.
     *
     * @Route("/{id}", name="division_show")
     * @Method("GET")
     */
    public function showAction(Division $division)
    {
        $deleteForm = $this->createDeleteForm($division);

        return $this->render('division/show.html.twig', array(
            'division' => $division,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Lists all faculty in a specific division
     *
     * @Route("/{id}/showfaculty", name="division_showfaculty")
     * @Method("GET")
     */
    public function showfacultyAction( $id)
    {

        $em = $this->getDoctrine()->getManager();

        $faculties = $em->getRepository('FacultyBundle:Faculty')->findFacultyWithDivisionName($id);

        return $this->render('division/showfaculty.html.twig', array(
            'faculties' => $faculties,
        ));
    }

    /**
     * Displays a form to edit an existing division entity.
     *
     * @Route("/{id}/edit", name="division_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Division $division)
    {
        $deleteForm = $this->createDeleteForm($division);
        $editForm = $this->createForm('FacultyBundle\Form\DivisionType', $division);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('division_edit', array('id' => $division->getId()));
        }

        return $this->render('division/edit.html.twig', array(
            'division' => $division,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a division entity.
     *
     * @Route("/{id}", name="division_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Division $division)
    {
        $form = $this->createDeleteForm($division);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($division);
            $em->flush();
        }

        return $this->redirectToRoute('division_index');
    }

    /**
     * Creates a form to delete a division entity.
     *
     * @param Division $division The division entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Division $division)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('division_delete', array('id' => $division->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
