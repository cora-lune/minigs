<?php
/**
 * Created by PhpStorm.
 * User: coraline
 * Date: 16/10/2017
 * Time: 16:33
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use AppBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategorieController extends Controller
{
    /**
     * @Route("/addcategorie", name="addcategorie")
     *
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function addcategorieAction(Request $request)
    {
        $categorie = new Categorie();

        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())  {

            $em = $this->getDoctrine()->getManager();

            $em->persist($categorie);
            $em->flush();

            return $this->render('default/categorieValidation.html.twig');
        }


        return $this->render('default/addCategorie.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/categorie", name="categorie")
     *
     * @return Response
     */

    public function categorieList()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:Categorie');
        $categorie = $repository->findAll();
        return $this->render('default/categorie.html.twig', array('categorie' => $categorie));
    }


    /**
     * @Route("/deletecategorie/{id}", name="deletecategorie")
     *
     * @param Categorie $categorie
     * @return Response
     */

    public function delete(Categorie $categorie)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($categorie);
        $em->flush();

        return $this->render('default/categorieModification.html.twig');
    }

}