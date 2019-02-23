<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 100; $i++) {
            $article = new Article();
            $article->setTitle('Some title #' . $i);
            $article->setContent($this->randomContent(random_int(0, 4)));
            $article->setUser($this->getReference(UserFixtures::REFERENCE . '-' . random_int(0, 4)));
            $article->setCategory($this->getReference(CategoryFixtures::REFERENCE . '-' . random_int(0, 4)));
            $manager->persist($article);
        }
        $manager->flush();
    }

    /**
     * @param int $key
     * @return mixed
     */
    private function randomContent(int $key)
    {
        $array = [
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At delectus exercitationem ipsum minima?',
            'Ut non nibh sit amet odio feugiat rutrum. Donec maximus facilisis urna, dignissim pretium eros aliquet.',
            'Mauris at blandit nulla. Sed et ante et magna ultrices eleifend vitae vitae lectus.',
            'Aliquam elementum est lorem, volutpat vehicula diam porttitor at. Sed tristique mauris vel erat feugiat.',
            'Integer lacinia purus sit amet cursus rhoncus. Suspendisse volutpat nunc quis sapien elementum aliquam.'
        ];
        if (!\in_array($key, $array, true)) {
            return $array[0];
        }
        return $array[$key];
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies(): array
    {
        return array(
            UserFixtures::class,
            CategoryFixtures::class,
        );
    }
}

