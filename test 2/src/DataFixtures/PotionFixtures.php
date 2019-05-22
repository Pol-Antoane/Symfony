<?php

namespace App\DataFixtures;

use App\Entity\Potion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PotionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPotions() as [$name, $power]) {
            $potion = new Potion;
            $potion
                ->setName($name)
                ->setHealingRate($power)
            ;

            $manager->persist($potion);
            $reference = $this->addReference($name, $potion);
        }

        $manager->flush();
    }

    public function getPotions()
    {
        // [name, power]
        return [
            ['Potion éco+', 20],
            ['Potion Gucchi', 50],
            ['MOUNTAIN DEW', 150]
            
        ];
    }
}

?>