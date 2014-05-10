<?php

namespace SeaTwi\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TweetController extends Controller
{
    public function indexAction()
    {
		return $this->render('SeaTwiBaseBundle:Tweet:index.html.twig'
			, array());
    }

    public function showAction($sHashtag)
    {
		return $this->render('SeaTwiBaseBundle:Tweet:show.html.twig'
			, array());
    }

}
