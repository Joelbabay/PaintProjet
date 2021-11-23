<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use App\Entity\Categories;
use App\Entity\Paint;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $user = new User;

        $user->setEmail('test@test.com')
            ->setName($faker->firstName())
            ->setLastname($faker->lastName())
            ->setPhone($faker->phoneNumber())
            ->setAbout($faker->paragraph())
            ->setInstagram('Instagram')
            ->setPassword(password_hash('password', PASSWORD_DEFAULT));
        // $product = new Product();
        $manager->persist($user);

        //10 blogs
        for ($i = 0; $i <= 10; $i++) {
            $blogPost = new BlogPost();
            $date = new DateTime();
            $date->modify('-6 month');

            $blogPost->setTitle($faker->words(3, true))
                ->setUser($user)
                ->setContents($faker->text(300))
                ->setCreatedAt($faker->dateTimeBetween('-5 month', 'now'))
                ->setSlug($faker->slug(3));

            $manager->persist($blogPost);
        }

        for ($k = 0; $k < 5; $k++) {
            $categories = new Categories;
            $categories->setName($faker->word())
                ->setDescription($faker->words(100, true))
                ->setSlug($faker->slug());

            $manager->persist($categories);

            //7 peintures
            for ($j = 0; $j <= 3; $j++) {
                $paint = new Paint();

                $paint->setUser($user)
                    ->setName($faker->word())
                    ->setWidth($faker->randomFloat(2, 20, 60))
                    ->setHeigth($faker->randomFloat(2, 20, 60))
                    ->setOnSale($faker->boolean())
                    ->setPrice($faker->randomFloat(2, 100, 9999))
                    ->setCompletionDate($faker->dateTimeBetween('-5 month', 'now'))
                    ->setCreatedAt($faker->dateTimeBetween('-5 month', 'now'))
                    ->setDescription($faker->text())
                    ->setPortfolio($faker->boolean())
                    ->setSlug($faker->slug())
                    ->setFile('/img/placeholder.jpg')
                    ->addCategorie($categories);

                $manager->persist($paint);
            }
        }
        $manager->flush();
    }
}
