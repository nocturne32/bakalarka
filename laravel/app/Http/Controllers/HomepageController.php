<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if (isset($request['author'])) {
            $articles = Article::where('user_id', $request['author'])->get();
        } elseif (isset($request['category'])) {
            $articles = Article::where('category_id', $request['category'])->get();
        } else {
            $articles = Article::all();
        }

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
