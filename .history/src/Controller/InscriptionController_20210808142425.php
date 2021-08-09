<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'inscription')]
    public function index(Request $request,UserRepository $userRepository,EntityManagerInterface $manager): Response
    {
        $users=$userRepository->findAll();
        $user=new User();
        $form=$this->createForm(UserType::class,$user);
        return $this->render('inscription/index.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
}
