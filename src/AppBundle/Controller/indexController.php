<?php
/**
 * Created by PhpStorm.
 * User: coraline
 * Date: 16/10/2017
 * Time: 16:33
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class indexController extends Controller
{
    /**
     * @Route("/produit")
     */

    public function indexAction()
    {

        return $this->render('default/index.html.twig');
    }

}