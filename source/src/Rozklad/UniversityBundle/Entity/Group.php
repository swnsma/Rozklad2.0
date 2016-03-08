<?php

namespace Rozklad\UniversityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groups
 */
class Group
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return Groups
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
     * @var \Rozklad\UniversityBundle\Entity\Specialty
     */
    private $specialty;


    /**
     * Set specialty
     *
     * @param \Rozklad\UniversityBundle\Entity\Specialty $specialty
     * @return Groups
     */
    public function setSpecialty(\Rozklad\UniversityBundle\Entity\Specialty $specialty = null)
    {
        $this->specialty = $specialty;

        return $this;
    }

    /**
     * Get specialty
     *
     * @return \Rozklad\UniversityBundle\Entity\Specialty
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }
}
