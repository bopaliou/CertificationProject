<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function index(Request $request,UserRepository $userRepository): Response
    {
        $user=$userRepository->findAll();
        $form=$this->createForm(UserType::class,$user)
        return $this->render('inscription/index.html.twig', [
            'user' =
            'form' => $form->createView(),
        ]);
    }
}
