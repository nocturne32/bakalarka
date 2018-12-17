<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    public function index()
    {
        $articles = [];

//        ze symfony
//        if ($id = $request->query->get('author')) {
//            $user = $em->find(User::class, $id);
//            $articles = $articles->findBy(['user' => $user->getId()], ['created_at' => 'DESC']);
//        } elseif ($id = $request->query->get('category')) {
//            $category = $em->find(Category::class, $id);
//            $articles = $articles->findBy(['category' => $category->getId()], ['created_at' => 'DESC']);
//        } else {
//            $articles = $articles->findBy([], ['created_at' => 'DESC']);
//        }

        return view('homepage.index', [
            'articles' => $articles
        ]);
    }
}
