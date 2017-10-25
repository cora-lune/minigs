<?php
/**
 * Created by PhpStorm.
 * User: coraline
 * Date: 16/10/2017
 * Time: 16:33
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\testType;

class FormController extends Controller
{
    /**
     * @Route("/testformulaire")
     */

    public function testformulaireAction()
    {
        $form = $this->createForm(testType::class);


        return $this->render('Formulaire/testformulaire.html.twig', array('form' => $form->createView()));
    }

}