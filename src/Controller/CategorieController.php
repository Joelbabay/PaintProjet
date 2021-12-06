<?php

namespace App\Controller;

use App\Repository\CategoriesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie/{name}', name: 'categorie')]
    public function index($name, CategoriesRepository $categoriesRepository, PaginatorInterface $paginatorInterface, Request $request): Response
    {
        $data = $categoriesRepository->findByName($name);
        $categories = $paginatorInterface->paginate(
            $data,
            $request->query->getInt('page', 1),
            6,
        );

        return $this->render('categorie/categorie.html.twig', [
            'categories' => $categories
        ]);
    }
}
