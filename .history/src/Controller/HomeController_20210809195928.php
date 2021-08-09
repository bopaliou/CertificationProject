<?php

namespace App\Controller;

use App\Repository\DocumentRepository;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(ImageRepository $imageRepository): Response
    {
        //$documents=$documentRepository->findAll();
        $images=$imageRepository->findAll();
        return $this->render('home/index.html.twig', [
           // 'documents' => $documents,
            'images' => $images,
        ]);
    }
}
