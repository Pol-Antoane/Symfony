<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPokemons() as [$name, $type, $HP, $attack, $attack2]) {
            $pokemon = new Pokemon;
            $pokemon
                ->setName($name)
                ->setType($type)
                ->setHP($HP)
                ->addAttack($attack)
                ->addAttack($attack2)
            ;

            $manager->persist($pokemon);
            $reference = $this->addReference($name, $pokemon);
        }

        $manager->flush();
    }

    public function getPokemons()
    {
        // [name, type, HP, attack, attack2]
        return [
            ['Feunnec', Type::TYPE_FIRE, 100, $this->getReference('Flammèche'), $this->getReference('Griffe')],
            ['Tiplouf', Type::TYPE_WATER, 120, $this->getReference('Bulles A O'), $this->getReference('EcrasFace')],
            ['Vipélierre', Type::TYPE_PLANT, 90, $this->getReference('Fouet-Liane'), $this->getReference('Charge')]

        ];
    }
}
