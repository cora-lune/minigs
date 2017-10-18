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
use AppBundle\Entity\Products;

class TestController extends Controller
{
    /**
     * @Route("/test")
     */

    public function ajoutAction()
    {
        $em = $this->getDoctrine()->getManager();
        /* $products = new Products();
        $products->setCategorie('Cadeau Femme');
        $products->setDescription('Une belle rose rouge');
        $products->setDisponible('1');
        $products->setImage('https://archzine.fr/wp-content/uploads/2015/08/1-signification-des-roses-bouquet-roses-rouges-magnifique-bouquet-de-fleurs-symbole-rose-rouge.jpg');
        $products->setNom('Rose');
        $products->setPrix('0.99');

        $em->persist($products);
        $em->flush ();*/
        $products= $em->getRepository('AppBundle:Products')->findAll();

        return $this->render('products.html.twig', array('products'=> $products));
    }

}