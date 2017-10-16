<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GenusController extends Controller
{
    /**
     * @Route("/")
     */
    public function testAction()
    {

        echo "test";

        return $this->render('default/test.html.twig');
    }

}