<?php
/**
 * Created by PhpStorm.
 * User: coraline
 * Date: 16/10/2017
 * Time: 16:33
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Products;
use AppBundle\Form\ProductsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{
    /**
     * @Route("/products")
     */

    public function addAction()
    {
        $products = new Products();

        $form = $this->createForm(ProductsType::class, $products);


        return $this->render('default/productsAdd.html.twig', array('form' => $form->createView()));
    }

}