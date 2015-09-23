<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $person = new Person();

        $person->setName('Billy the kid');
        $person->setAge(15);

        $form = $this->createFormBuilder($person)
            ->add('name', 'text', array('attr' => array('class' => 'form-control')))
            ->add('age', 'integer', array('attr' => array('class' => 'form-control')))
            ->add('save', 'submit', array('attr' => array('class' => 'btn btn-default btn-lg')))
            ->getForm();

        $form->handleRequest($request);
        if($form->isValid())
        {
            exit('form was valid');
        }

        return $this->render('index.html.twig', array( 'form' => $form->createView()));

    }

    /**
     * @Route("/empty")
     */

    public function emptyFunction()
    {
        return $this->render('empty.html.twig');
    }
}