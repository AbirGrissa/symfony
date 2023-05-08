<?php

namespace App\DataFixtures;

use App\Entity\Abscencee;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AbscenceFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i=1;$i<=10;$i++)
        {
        $abs=new Abscencee();
        $abs->setSenace("seance $i")
        ->setModule("Module de seance $i")
        ->setExcuse("Excuse de senace $i")
        ->setDate(new \DatetimeImmutable());
        $manager->persist($abs);
        }
        $manager->flush();
            }
    }

