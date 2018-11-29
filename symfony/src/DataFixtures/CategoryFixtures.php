<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const REFERENCE = 'category-reference';

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();
            $category->setLabel('Category #'.$i);
            $category->setDescription('Category description.');
            $manager->persist($category);

            $this->addReference(self::REFERENCE . '-' . $i, $category);
        }
        $manager->flush();
    }
}
