<?php
namespace App\DataFixtures;

use App\Entity\Visite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            ['ville'=>'paris','pays'=>'France','note'=>17,'tempmin'=>8,'tempmax'=>22,'date'=>'2025-10-20','image'=>'Paris.png',     'envs'=>[3,6]],
            ['ville'=>'Tokyo','pays'=>'Japon','note'=>19,'tempmin'=>5,'tempmax'=>28,'date'=>'2025-10-20','image'=>'Tokyo.png',     'envs'=>[6]],
            ['ville'=>'New York','pays'=>'États-Unis','note'=>15,'tempmin'=>-3,'tempmax'=>30,'date'=>'2025-10-20','image'=>'New york.png','envs'=>[3]],
            ['ville'=>'Rome','pays'=>'Italie','note'=>14,'tempmin'=>10,'tempmax'=>25,'date'=>'2025-10-20','image'=>'Rome.png',     'envs'=>[5]],
            ['ville'=>'Berlin','pays'=>'Allemagne','note'=>12,'tempmin'=>6,'tempmax'=>20,'date'=>'2025-10-20','image'=>'Berlin.png','envs'=>[0]],
            ['ville'=>'Dakar','pays'=>'Sénégal','note'=>18,'tempmin'=>18,'tempmax'=>34,'date'=>'2025-10-20','image'=>'Dakar.png',  'envs'=>[2]],
            ['ville'=>'Montréal','pays'=>'Canada','note'=>13,'tempmin'=>-10,'tempmax'=>25,'date'=>'2025-10-20','image'=>'Montréal.png','envs'=>[4]],
        ];

        foreach ($data as $item) {
            $visite = new Visite();
            $visite->setVille($item['ville']);
            $visite->setPays($item['pays']);
            $visite->setNote($item['note']);
            $visite->setTempmin($item['tempmin']);
            $visite->setTempmax($item['tempmax']);
            $visite->setDatecreation(new \DateTimeImmutable($item['date']));
            $visite->setImageName($item['image']);

            // Ajout des environnements via les références créées par EnvironnementFixtures
            foreach ($item['envs'] as $idx) {
                $visite->addEnvironnement($this->getReference('env_'.$idx));
            }

            $manager->persist($visite);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [EnvironnementFixtures::class];
    }
}
