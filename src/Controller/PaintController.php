<?php

namespace App\Controller;

use App\Repository\PaintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaintController extends AbstractController
{
    #[Route('/paint/{slug}', name: 'paint')]
    public function index($slug, PaintRepository $paintRepository): Response
    {
        return $this->render('paint/paint.html.twig', [
            'paint' => $paintRepository->findBySlug($slug),
        ]);
    }
}
