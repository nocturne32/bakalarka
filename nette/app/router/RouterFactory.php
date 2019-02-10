<?php

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


final class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList;

        $router[] = new Route('articles', 'ArticleList:default');
        
//        $router[] = new Route('articles/<id>/delete', 'Article:edit');
        $router[] = new Route('articles/<id \d+>/edit', 'Article:edit');
        $router[] = new Route('articles/<id \d+>', 'Article:default');
        $router[] = new Route('articles/create', 'Article:add');
        $router[] = new Route('articles', 'ArticleList:default');
        
        $router[] = new Route('categories/<id \d+>/edit', 'Category:edit');
        $router[] = new Route('categories/create', 'Category:add');
        $router[] = new Route('categories', 'CategoryList:default');

        $router[] = new Route('login', 'Sign:in');
        $router[] = new Route('register', 'Sign:up');
        $router[] = new Route('logout', 'Sign:out');

        $router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}
}
