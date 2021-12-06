<?php

namespace App\Controller;

use App\Repository\PaintRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    const PAGINATOR_PER_PAGE = 6;
    #[Route('/', name: 'home')]
    public function index(
        PaintRepository $paintRepository,
        Request $request,
        PaginatorInterface $paginator,
    ): Response {
        $paints = $paintRepository->findAll();
        $pagination = $paginator->paginate(
            $paints,
            $request->query->getInt('page', 1),
            self::PAGINATOR_PER_PAGE
        );
        //dd($paintRepository->getLastThree());
        return $this->render('home/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
