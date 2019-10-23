<?php

namespace App\DataFixtures;

use App\Entity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LivreFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        for($i=1; $i<10; $i++){

            $livre = new Livre();
            $livre 
                    ->setTitle("Titre Livre n°$i")
                    ->setResume("Resume du livre N°$i")
                    ->setContenu("Contenu du livre N°$i")
                    ->setCouerture("http://placehold.it/300x200")
                    ->->setCreatedAt(new \DateTime());

            $manager->persist($livre);
        }
        $manager->flush();
    }


}

