<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class GenusController extends Controller
{
    /**
     * @Route("/", name="MiniGuidesShopping")
     */
    public function testAction()
    {
        return $this->render('default/test.html.twig');
    }


}