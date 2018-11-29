<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleListController extends AbstractController
{
    /**
     * @Route("/article/list", name="app_article_list")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em): Response
    {
        $articles = $em->getRepository(Article::class);

        $user = $this->getUser();
        if ($user->isAdmin()) {
            $articles = $articles->findBy([], ['created_at' => 'DESC']);
        } else {
            $articles = $articles->findBy(['user' => $user->getId()], ['created_at' => 'DESC']);
        }
        return $this->render('article_list/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
