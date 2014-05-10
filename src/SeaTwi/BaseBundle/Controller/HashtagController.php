<?php

namespace SeaTwi\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HashtagController extends Controller
{
    public function indexAction()
    {
		return $this->render('SeaTwiBaseBundle:Hashtag:index.html.twig'
			, array());
    }

    public function editAction($iId)
    {
		return $this->render('SeaTwiBaseBundle:Hashtag:edit.html.twig'
			, array());
    }

    public function deleteAction($iId)
    {
		return $this->render('SeaTwiBaseBundle:Hashtag:delete.html.twig'
			, array());
    }

}
