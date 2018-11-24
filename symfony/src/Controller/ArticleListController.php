<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleListController extends AbstractController
{
    /**
     * @Route("/article/list", name="article_list")
     */
    public function index()
    {
        return $this->render('article_list/index.html.twig', [
            'controller_name' => 'ArticleListController',
        ]);
    }
}
