<?php

namespace Rozklad\UniversityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Schedule
 * @package Rozklad\UniversityBundle\Entity
 */
class Schedule
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $from;

    /**
     * @var \DateTime
     */
    private $to;


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
     * @param $from
     * @return $this
     */
    public function setFrom($from)
    {
        $this->$from = $from;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param $to
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTo()
    {
        return $this->to;
    }
}
