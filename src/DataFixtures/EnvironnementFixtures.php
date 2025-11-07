<?php
namespace App\DataFixtures;

use App\Entity\Environnement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EnvironnementFixtures extends Fixture
{
    public const LISTE = [
        'La porte de Brandebourg',
        'La seine',
        'Monument de la renaissance africaine',
        'Statut de la Liberté',
        'La grande roue du Vieux-Port de Montréal',
        'Ruines du Forum Romain',
        'Urbain futuriste et technologique',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::LISTE as $index => $nom) {
            $env = new Environnement();
            $env->setNom($nom);
            $manager->persist($env);

            // référence pour les autres fixtures (clé stable)
            $this->addReference('env_'.$index, $env);
        }
        $manager->flush();
    }
}
