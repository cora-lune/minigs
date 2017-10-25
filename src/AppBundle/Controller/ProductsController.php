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


    /**
     * @Route("/liste", name="ProductsListe")
     *
     * @return Response
     */

    public function productsList()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Products');
        $products = $repository->findAll();
        return $this->render('default/productsListe.html.twig', array('products' => $products));
    }

    /**
     * @Route("/edit/{id}", name="ProductsEdit")
     *
     * @return Response
     */
    public function edit(Request $request, Products $products)
    {
        $form = $this->createForm(ProductsType::class, $products);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())  {

            $em = $this->getDoctrine()->getManager();

            $em->flush();

            return $this->render('default/productsModification.html.twig');
        }


        return $this->render('default/productsAdd.html.twig', array('form' => $form->createView()));
    }


}