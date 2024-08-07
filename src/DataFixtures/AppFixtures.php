<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private const NB_ARTICLES = 150;
    private const CATEGORIES = ['Technologie', 'Santé', 'Science', 'Voyage', 'Finance'];

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // catégories
        $categories = [];
        foreach (self::CATEGORIES as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $manager->persist($category);
            $categories[] = $category;
        }

        // articles
        for ($i = 0; $i < self::NB_ARTICLES; $i++) {
            $article = new Article();
            $article
                ->setTitle($faker->sentence) // setTitle($faker->words($faker->numberBetween(4,12)))
                ->setContent($faker->realTextBetween(350, 700)) // setContent($faker->paragraphs(3, true))
                ->setCreatedAt($faker->dateTimeThisYear) // setCreatedAt($faker->dateTimeBetween('-4 years'))
                ->setVisible($faker->boolean) // setVisible($faker->boolean(80))
                ->setCategory($faker->randomElement($categories)); // setCategory($faker->)

            $manager->persist($article);
        }

        $manager->flush();
    }
}
