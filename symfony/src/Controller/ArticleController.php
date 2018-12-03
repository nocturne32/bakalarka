<?php

namespace App\Controller;

use App\Entity\Article;
use App\Forms\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/article-list", name="app_article_list")
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
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/article/{id<\d+>}", name="app_article")
     * @param EntityManagerInterface $em
     * @param int $id
     * @return Response
     */
    public function detail(EntityManagerInterface $em, int $id): Response
    {
        $article = $em->find(Article::class, $id);

        if (!$article) {
            $this->addFlash('warning', 'Article was not found.');
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('article/index.html.twig', [
            'article' => $article,
        ]);
    }

    /**
     * @Route("/article/add", name="app_article_add")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ArticleType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();
            $article->setUser($this->getUser());

            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'Your article was successfully created!');
            return $this->redirectToRoute('app_article_list');
        }
        return $this->render('article/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/article/{id<\d+>}/edit", name="app_article_edit")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, EntityManagerInterface $em, int $id): Response
    {
        $form = $this->createForm(ArticleType::class);
        $article = $em->find(Article::class, $id);

        if (!$article) {
            $this->addFlash('warning', 'Article was not found.');
            return $this->redirectToRoute('app_article_list');
        }

        $form->setData($article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article = $form->getData();

            $em->persist($article);
            $em->flush();

            $this->addFlash('success', 'Your article was successfully edited!');
            return $this->redirectToRoute('app_article_list');
        }
        return $this->render('article/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/article/{id<\d+>}/delete", name="app_article_delete")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @param EntityManagerInterface $em
     * @param int $id
     * @return Response
     */
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        $article = $em->find(Article::class, $id);

        if (!$article) {
            $this->addFlash('warning', 'Article was not found.');
            return $this->redirectToRoute('app_article_list');
        }

        $user = $this->getUser();

        if ($user->isAdmin() || $user === $article->getUser()) {
            $this->addFlash('success', 'Article "' . $article->getTitle() . '" was removed.');
            $em->remove($article);
            $em->flush();
        } else {
            $this->addFlash('danger', 'You cannot perform this operation.');
        }

        return $this->redirectToRoute('app_article_list');
    }
}
