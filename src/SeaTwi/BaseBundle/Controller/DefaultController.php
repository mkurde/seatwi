<?php

namespace SeaTwi\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SeaTwiBaseBundle:Default:index.html.twig' , array(
         ));
    }


}
