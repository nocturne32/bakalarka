<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $articles = $em->getRepository(Article::class);

        if ($id = $request->query->get('author')) {
            $user = $em->find(User::class, $id);
            $articles = $articles->findBy(['user' => $user->getId()], ['created_at' => 'DESC']);
        } elseif ($id = $request->query->get('category')) {
            $category = $em->find(Category::class, $id);
            $articles = $articles->findBy(['category' => $category->getId()], ['created_at' => 'DESC']);
        } else {
            $articles = $articles->findBy([], ['created_at' => 'DESC']);
        }

        return $this->render('homepage/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
