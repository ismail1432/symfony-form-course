<?php


namespace App\Controller;


use App\Entity\Job;
use App\Form\JobType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request)
    {
        $job = new Job();
        $form = $this->createForm(JobType::class, $job, ['my_title' => 'Super Developer']);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            dd($form->getData()->get('title'));
        }

        return $this->render('add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
