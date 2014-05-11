<?php

namespace SeaTwi\BaseBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SeaTwi\BaseBundle\Entity\Hashtag;
use SeaTwi\BaseBundle\Form\HashtagType;

/**
 * Hashtag controller.
 *
 */
class HashtagController extends Controller
{

    /**
     * Lists all Hashtag entities.
     *
     */
    public function indexAction()
    {

        // form
        $entity = new Hashtag();
        $form = $this->createCreateForm($entity);

        // list
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('SeaTwiBaseBundle:Hashtag')->findAll();

        return $this->render('SeaTwiBaseBundle:Hashtag:index.html.twig', array(
            'entities' => $entities,
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Hashtag entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Hashtag();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hashtag'));
        }

        return $this->render('SeaTwiBaseBundle:Hashtag:index.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Hashtag entity.
     *
     * @param Hashtag $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Hashtag $entity)
    {
        $form = $this->createForm(new HashtagType(), $entity, array(
            'action' => $this->generateUrl('hashtag_create'),
            'method' => 'POST',
            'attr'=> array('class'=>'form-inline'),
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Creates a form to delete a Hashtag entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hashtag_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

    /**
     * Displays a form to edit an existing Hashtag entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeaTwiBaseBundle:Hashtag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hashtag entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SeaTwiBaseBundle:Hashtag:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Hashtag entity.
     *
     * @param Hashtag $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Hashtag $entity)
    {
        $form = $this->createForm(new HashtagType(), $entity, array(
            'action' => $this->generateUrl('hashtag_update', array('id' => $entity->getId())),
            'method' => 'PUT',
            'attr'=> array('class'=>'form-inline'),
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Hashtag entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SeaTwiBaseBundle:Hashtag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hashtag entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('hashtag'));
        }

        return $this->render('SeaTwiBaseBundle:Hashtag:edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Hashtag entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SeaTwiBaseBundle:Hashtag')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Hashtag entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hashtag'));
    }
}
