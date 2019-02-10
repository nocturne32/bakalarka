<?php

namespace App\Controller;

use App\Entity\Category;
use App\Forms\CategoryType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories", name="app_category_list")
     * @IsGranted("ROLE_ADMIN")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em): Response
    {
        $categories = $em->getRepository(Category::class)
            ->findBy([], ['id' => 'DESC']);

        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/categories/create", name="app_category_add")
     * @IsGranted("ROLE_ADMIN")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(CategoryType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em->persist($category);
            $em->flush();

            $this->addFlash('success', 'Category was successfully created!');
            return $this->redirectToRoute('app_category_list');
        }
        return $this->render('category/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/categories/{id<\d+>}/edit", name="app_category_edit")
     * @IsGranted("ROLE_ADMIN")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param int $id
     * @return Response
     */
    public function edit(Request $request, EntityManagerInterface $em, int $id): Response
    {
        $form = $this->createForm(CategoryType::class);
        $category = $em->find(Category::class, $id);

        if (!$category) {
            $this->addFlash('warning', 'Category was not found.');
            return $this->redirectToRoute('app_category_list');
        }

        $form->setData($category);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $category = $form->getData();

            $em->persist($category);
            $em->flush();

            $this->addFlash('success', 'Category was successfully edited!');
            return $this->redirectToRoute('app_category_list');
        }
        return $this->render('category/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/categories/{id<\d+>}/delete", name="app_category_delete")
     * @IsGranted("ROLE_ADMIN")
     * @param EntityManagerInterface $em
     * @param int $id
     * @return Response
     */
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        $category = $em->find(Category::class, $id);

        if (!$category) {
            $this->addFlash('warning', 'Category was not found.');
            return $this->redirectToRoute('app_category_list');
        }

        if ($category->getArticles()) {
            $this->addFlash('danger', 'Some articles are still linked to this category.');
            return $this->redirectToRoute('app_category_list');
        }

        $this->addFlash('success', 'Category "' . $category->getLabel() . '" was removed.');
        $em->remove($category);
        $em->flush();

        return $this->redirectToRoute('app_category_list');
    }
}
