<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Emprunt;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EmpruntFixtures extends BaseFixture implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(10, "emprunt", function($num){
        
            $dateSortie = $this->faker->dateTime("now");
            $dateRendu = $this->faker->dateTimeBetween($dateSortie, "now");
            
            $emprunt = new Emprunt;
            $emprunt->setDateSortie($dateSortie)
                    ->setDateRendu($dateSortie)
                    ->setAbonne($this->getRandomReference("abonne"))
                    ->setLivre($this->getRandomReference("livre"));
            
            return $emprunt;

        });
        $manager->flush();
    }

    public function getDependencies()
    {
        return [AbonneFixtures::class, LivreFixtures::class];
        //dans le même namespace donc pas besoin de use
    }
}
