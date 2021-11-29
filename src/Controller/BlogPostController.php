<?php

namespace App\Controller;

use App\Repository\BlogPostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends AbstractController
{
    const PAGINATOR_PER_PAGE = 6;
    #[Route('/blog/standard-post', name: 'blog_post')]
    public function index(BlogPostRepository $blogPostRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $data = $blogPostRepository->findAll();
        $pagination = $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            self::PAGINATOR_PER_PAGE
        );
        return $this->render('blog_post/blog.html.twig', [
            'pagination' => $pagination
        ]);
    }
}
