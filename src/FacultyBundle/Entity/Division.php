<?php

namespace FacultyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Division
 *
 * @ORM\Table(name="division")
 * @ORM\Entity(repositoryClass="FacultyBundle\Repository\DivisionRepository")
 */
class Division
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=1500, nullable=true)
     */
    private $name;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="FacultyBundle\Entity\Faculty", mappedBy="division")
     */
    private $facultyList;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Division
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->facultyList = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add facultyList
     *
     * @param \FacultyBundle\Entity\Faculty $facultyList
     *
     * @return Division
     */
    public function addFacultyList(\FacultyBundle\Entity\Faculty $facultyList)
    {
        $this->facultyList[] = $facultyList;

        return $this;
    }

    /**
     * Remove facultyList
     *
     * @param \FacultyBundle\Entity\Faculty $facultyList
     */
    public function removeFacultyList(\FacultyBundle\Entity\Faculty $facultyList)
    {
        $this->facultyList->removeElement($facultyList);
    }

    /**
     * Get facultyList
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFacultyList()
    {
        return $this->facultyList;
    }
    public function __toString()
    {
        return $this->getName();
    }
}
