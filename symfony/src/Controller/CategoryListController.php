<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryListController extends AbstractController
{
    /**
     * @Route("/category/list", name="app_category_list")
     * @IsGranted("ROLE_ADMIN")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em): Response
    {
        $categories = $em->getRepository(Category::class)
            ->findBy([], ['id' => 'DESC']);

        return $this->render('category_list/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
