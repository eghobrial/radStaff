<?php
/**
 * Created by PhpStorm.
 * User: eghobrial
 * Date: 8/6/17
 * Time: 6:43 PM
 */

namespace FacultyBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\DBAL\Sharding\ShardManager;
use FacultyBundle\Entity\Division;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;


class LoadDictionary extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // TODO: Implement load() method.
        $divisionb = new Division();
        $divisionb->setName("Body");
        $divisionc = new Division();
        $divisionc->setName("Cardiothoractic-Chest");
        $divisionbr = new Division();
        $divisionbr->setName("Cardiothoractic-Breast");
        $divisionmsk = new Division();
        $divisionmsk->setName("Musculoskeletal");
        $divisionn = new Division();
        $divisionn->setName("Neuroradiology");
        $divisionnm = new Division();
        $divisionnm->setName("Nuclear Medicine");
        $divisionir = new Division();
        $divisionir->setName("Vascular Interventional");
        $manager->persist($divisionb);
        $manager->persist($divisionc);
        $manager->persist($divisionbr);
        $manager->persist($divisionmsk);
        $manager->persist($divisionn);
        $manager->persist($divisionnm);
        $manager->persist($divisionir);
        $manager->flush();
        $this->addReference("Body",$divisionb);
        $this->addReference("Cardiothoratic-Chest",$divisionc);
        $this->addReference("Cardiothoratic-Breast",$divisionbr);
        $this->addReference("Musculoskeletal",$divisionmsk);
        $this->addReference("Neuroradiology",$divisionn);
        $this->addReference("Nuclear Medicine",$divisionnm);
        $this->addReference("Vascular Interventional",$divisionir);
    }


    public function addReference($name, $object)
    {
        parent::addReference($name, $object);
    }

    public function getOrder()
    {
        // TODO: Implement getOrder() method.
        return 1;
    }
}