<?php


namespace AppBundle\DataFixtures;


use AppBundle\Entity\Candidature;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadDataCandidature implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        for($i=0;$i<=20;$i++){
            $candidature = new Candidature();

            $candidature->setNomEntreprise($faker->company);
            $candidature->setPoste($faker->jobTitle);
            $candidature->setAdresse($faker->streetAddress);
            $candidature->setVille($faker->city);
            $candidature->setEtat("En Attente");

            $manager->persist($candidature);
        }

        $manager->flush();
    }
}