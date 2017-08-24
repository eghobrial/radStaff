<?php

namespace FacultyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use FacultyBundle\Entity\Division;
use FacultyBundle\Entity\Faculty;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Created by PhpStorm.
 * User: eghobrial
 * Date: 8/6/17
 * Time: 6:19 PM
 */
class LoadFaculty extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $faculty1 = new Faculty();
        $faculty1->setFirstname("Roland");
        $faculty1->setLastname("Lee");
        $faculty1->setEmail("rrlee@ucsd.edu");
        $faculty1->setPhone("619-543-6766");
        $faculty1->setDivision($this->getReference("Neuroradiology"));
        $faculty1->setNotes("Section Chief");

        $faculty2 = new Faculty();
        $faculty2->setFirstname("James");
        $faculty2->setLastname("Chen");
        $faculty2->setEmail("jyc042@ucsd.edu");
        $faculty2->setPhone("619-543-6766");
        $faculty2->setDivision($this->getReference("Neuroradiology"));
        $faculty2->setNotes("Fellowship Director");

        $faculty3 = new Faculty();
        $faculty3->setFirstname("Julie");
        $faculty3->setLastname("Bykowski");
        $faculty3->setEmail("jbykowski@ucsd.edu");
        $faculty3->setPhone("619-543-6766");
        $faculty3->setDivision($this->getReference("Neuroradiology"));
        $faculty3->setNotes("");

        $faculty4 = new Faculty();
        $faculty4->setFirstname("Jeet");
        $faculty4->setLastname("Minocha");
        $faculty4->setEmail("jminocha@ucsd.edu");
        $faculty4->setPhone("858-657-6698");
        $faculty4->setDivision($this->getReference("Vascular Interventional"));
        $faculty4->setNotes("Interim Chief");

        $faculty5 = new Faculty();
        $faculty5->setFirstname("Gerant");
        $faculty5->setLastname("Rivera-Sanfeliz");
        $faculty5->setEmail("griverasanfeliz@ucsd.edu");
        $faculty5->setPhone("858-657-6698");
        $faculty5->setDivision($this->getReference("Vascular Interventional"));
        $faculty5->setNotes("Fellowship Director");

        $faculty6 = new Faculty();
        $faculty6->setFirstname("Hamed");
        $faculty6->setLastname("Aryafar");
        $faculty6->setEmail("haryafar@ucsd.edu");
        $faculty6->setPhone("858-657-6698");
        $faculty6->setDivision($this->getReference("Vascular Interventional"));
        $faculty6->setNotes("IT Chief");

        $manager->persist($faculty1);
        $manager->persist($faculty2);
        $manager->persist($faculty3);
        $manager->persist($faculty4);
        $manager->persist($faculty5);
        $manager->persist($faculty6);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 2;
    }

}