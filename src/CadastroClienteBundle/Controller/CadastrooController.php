<?php

namespace CadastroClienteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CadastroClienteBundle\Entity\Cadastroo;
use CadastroClienteBundle\Form\CadastrooType;

/**
 * Cadastroo controller.
 *
 * @Route("/cadastroo")
 */
class CadastrooController extends Controller
{
    /**
     * Lists all Cadastroo entities.
     *
     * @Route("/", name="cadastroo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cadastroos = $em->getRepository('CadastroClienteBundle:Cadastroo')->findAll();

        return $this->render('cadastroo/index.html.twig', array(
            'cadastroos' => $cadastroos,
        ));
    }

    /**
     * Creates a new Cadastroo entity.
     *
     * @Route("/new", name="cadastroo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cadastroo = new Cadastroo();
        $form = $this->createForm(new CadastrooType(), $cadastroo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cadastroo);
            $em->flush();

            return $this->redirectToRoute('cadastroo_show', array('id' => $cadastroo->getId()));
        }

        return $this->render('cadastroo/new.html.twig', array(
            'cadastroo' => $cadastroo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cadastroo entity.
     *
     * @Route("/{id}", name="cadastroo_show")
     * @Method("GET")
     */
    public function showAction(Cadastroo $cadastroo)
    {
        $deleteForm = $this->createDeleteForm($cadastroo);

        return $this->render('cadastroo/show.html.twig', array(
            'cadastroo' => $cadastroo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cadastroo entity.
     *
     * @Route("/{id}/edit", name="cadastroo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cadastroo $cadastroo)
    {
        $deleteForm = $this->createDeleteForm($cadastroo);
        $editForm = $this->createForm(new CadastrooType(), $cadastroo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cadastroo);
            $em->flush();

            return $this->redirectToRoute('cadastroo_edit', array('id' => $cadastroo->getId()));
        }

        return $this->render('cadastroo/edit.html.twig', array(
            'cadastroo' => $cadastroo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cadastroo entity.
     *
     * @Route("/{id}", name="cadastroo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cadastroo $cadastroo)
    {
        $form = $this->createDeleteForm($cadastroo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cadastroo);
            $em->flush();
        }

        return $this->redirectToRoute('cadastroo_index');
    }

    /**
     * Creates a form to delete a Cadastroo entity.
     *
     * @param Cadastroo $cadastroo The Cadastroo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cadastroo $cadastroo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cadastroo_delete', array('id' => $cadastroo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
