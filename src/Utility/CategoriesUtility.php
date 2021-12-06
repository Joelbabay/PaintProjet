<?php

namespace App\Utility;

use App\Repository\CategoriesRepository;
use Twig\Extension\AbstractExtension;

class CategoriesUtility extends AbstractExtension
{
    private $categories;
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categories = $categoriesRepository->findAll();
    }

    public function getCategorie()
    {
        return $this->categories;
    }
}
