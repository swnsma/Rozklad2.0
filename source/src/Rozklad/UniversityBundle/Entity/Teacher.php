<?php

namespace Rozklad\UniversityBundle\Entity;

/**
 * Teacher
 */
class Teacher
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
     * @param  string  $name
     * @return Teacher
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
     * @var \Rozklad\UniversityBundle\Entity\Chair
     */
    private $chair;

    /**
     * Set chair
     *
     * @param  \Rozklad\UniversityBundle\Entity\Chair $chair
     * @return Teacher
     */
    public function setChair(\Rozklad\UniversityBundle\Entity\Chair $chair = null)
    {
        $this->chair = $chair;

        return $this;
    }

    /**
     * Get chair
     *
     * @return \Rozklad\UniversityBundle\Entity\Chair
     */
    public function getChair()
    {
        return $this->chair;
    }
}
