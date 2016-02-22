<?php

namespace Rozklad\UniversityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specialty
 */
class Specialty
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Specialty
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @var \Rozklad\UniversityBundle\Entity\Faculty
     */
    private $faculty;


    /**
     * Set faculty
     *
     * @param \Rozklad\UniversityBundle\Entity\Faculty $faculty
     * @return Specialty
     */
    public function setFaculty(\Rozklad\UniversityBundle\Entity\Faculty $faculty = null)
    {
        $this->faculty = $faculty;

        return $this;
    }

    /**
     * Get faculty
     *
     * @return \Rozklad\UniversityBundle\Entity\Faculty
     */
    public function getFaculty()
    {
        return $this->faculty;
    }

    public function __toString()
    {
        return (string)$this->title;
    }
}
