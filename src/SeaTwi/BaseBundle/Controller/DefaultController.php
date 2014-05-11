<?php

namespace SeaTwi\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $twitterClient = $this->container->get('guzzle.twitter.client');
        $status = $twitterClient->get('statuses/user_timeline.json')
            ->send()->getBody();

        return $this->render('SeaTwiBaseBundle:Default:index.html.twig' , array(
                'status' => $status
            ));
    }


}
