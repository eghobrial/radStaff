<?php

namespace FacultyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faculty
 *
 * @ORM\Table(name="faculty")
 * @ORM\Entity(repositoryClass="FacultyBundle\Repository\FacultyRepository")
 */
class Faculty
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
     * @ORM\Column(name="Firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="Lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var Division
     *
     * @ORM\ManyToOne(targetEntity="FacultyBundle\Entity\Division", inversedBy="facultyList")
     * @ORM\JoinColumn(name="division_id", referencedColumnName="id")
     *
     */
    private $division;

    /**
     * @var string
     *
     * @ORM\Column(name="Notes", type="string", length=1500, nullable=true)
     */
    private $notes;


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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Faculty
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Faculty
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Faculty
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Faculty
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }



    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Faculty
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set division
     *
     * @param \FacultyBundle\Entity\Division $division
     *
     * @return Faculty
     */
    public function setDivision(\FacultyBundle\Entity\Division $division=null)
    {
        $this->division = $division;
        return $this;
    }

    /**
     * Get division
     *
     * @return \FacultyBundle\Entity\Division
     */
    public function getDivision()
    {
        return $this->division;
    }

}
