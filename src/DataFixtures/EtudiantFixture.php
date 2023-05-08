<?php

namespace App\DataFixtures;

use App\Entity\Etudiantt;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtudiantFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1;$i<=10;$i++)
{
$etud=new Etudiantt();
$etud->setMatricule("Matricule de l'etudiant $i")
->setCin(12345678)
->setNom("Nom de l'etudiant $i")
->setClassse("classe de l'etudiant $i")
->setDN(new \DatetimeImmutable());
$manager->persist($etud);
}
$manager->flush();
    }
}
