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

class adminController extends Controller
{
    /**
     * @Route("/admin")
     */

    public function indexAction()
    {

        return $this->render('administration/layoutadmin.html.twig');
    }

}