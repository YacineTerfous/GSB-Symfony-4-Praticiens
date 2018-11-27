<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PraticienFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        {
            $faker=Factory::create("fr_FR");
    
            //création des catégories
            for($i=0;$i<=3;$i++){
                $categorie=new Categorie();
                    $categorie->setDesignation($faker->sentence($nbWords = 4, $variableNbWords = true));
                    $manager->persist($categorie);
                
                // $product = new Product();
                // $manager->persist($product);
                
                        for($j=0;$j<=mt_rand(0,11);$j++){
                        $Praticien=new Praticien();
                        $Praticien->setNum(mt_rand(0,11))
                                ->setNom($faker->sentence($nbWords = 6, $variableNbWords = true))
                                ->setAvatar($faker->imageUrl($wPraticienth = 300, $height = 200))
                                ->setAdresse($faker-sentence($nbWords = 20, $variableNbWords = true))
                                ->setCodepostal(mt_rand(5))
                                ->setVille($faker-sentence($nbWords = 20, $variableNbWords = true))
                                ->setTel(mt_rand(10));
                                // creer Pra_coefnotoriete avec faker
                                $manager->persist($Praticien);
                        }
            }
        $manager->flush();
    }
}
}