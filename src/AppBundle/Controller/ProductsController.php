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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{
    /**
     * @Route("/products", name="addProducts")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function addAction(Request $request)
    {
        $products = new Products();

        $form = $this->createForm(ProductsType::class, $products);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())  {

            $em = $this->getDoctrine()->getManager();

            $em->persist($products);
            $em->flush();

            return $this->render('default/productsValidation.html.twig');
        }


        return $this->render('default/productsAdd.html.twig', array('form' => $form->createView()));
    }

}