<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        //        ze symfony
//        $user = $this->getUser();
//        if ($user->isAdmin()) {
//            $articles = $articles->findBy([], ['created_at' => 'DESC']);
//        } else {
//            $articles = $articles->findBy(['user' => $user->getId()], ['created_at' => 'DESC']);
//        }

        return view('article.index', [
            'articles' => $articles,
        ]);
    }

    public function detail(int $id)
    {
        $article = null;

//        if (!$article) {
//            $this->addFlash('warning', 'Article was not found.');
//            return $this->redirectToRoute('app_homepage');
//        }

        return view('article.detail', [
            'article' => $article,
        ]);
    }

    public function add()
    {
//        $form = $this->createForm(ArticleType::class);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $article = $form->getData();
//            $article->setUser($this->getUser());
//
//            $em->persist($article);
//            $em->flush();
//
//            $this->addFlash('success', 'Your article was successfully created!');
//            return $this->redirectToRoute('app_article_list');
//        }
        return view('article.add', [
//            'form' => $form->createView()
        ]);
    }

    public function edit(int $id)
    {
        $article = null;

//        if (!$article) {
//            $this->addFlash('warning', 'Article was not found.');
//            return $this->redirectToRoute('app_article_list');
//        }
//
//        $form->setData($article);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $article = $form->getData();
//
//            $em->persist($article);
//            $em->flush();
//
//            $this->addFlash('success', 'Your article was successfully edited!');
//            return $this->redirectToRoute('app_article_list');
//        }
        return view('article.edit', [
//            'form' => $form->createView()
        ]);
    }

    public function delete(int $id)
    {
//        $article = $em->find(Article::class, $id);
//
//        if (!$article) {
//            $this->addFlash('warning', 'Article was not found.');
//            return $this->redirectToRoute('app_article_list');
//        }
//
//        $user = $this->getUser();
//
//        if ($user->isAdmin() || $user === $article->getUser()) {
//            $this->addFlash('success', 'Article "' . $article->getTitle() . '" was removed.');
//            $em->remove($article);
//            $em->flush();
//        } else {
//            $this->addFlash('danger', 'You cannot perform this operation.');
//        }
//
//        return $this->redirectToRoute('app_article_list');
    }
}
