<?php

namespace Rozklad\UniversityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 */
class Event
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @var \Rozklad\UniversityBundle\Entity\Schedule
     */
    private $schedule;

    /**
     * @var \Rozklad\UniversityBundle\Entity\Auditory
     */
    private $auditory;

    /**
     * @var \Rozklad\UniversityBundle\Entity\Subject
     */
    private $subject;

    /**
     * @var \Rozklad\UniversityBundle\Entity\Teacher
     */
    private $teacher;

    /**
     * @var \Rozklad\UniversityBundle\Entity\Group
     */
    private $group;


    /**
     * Set schedule
     *
     * @param \Rozklad\UniversityBundle\Entity\Schedule $schedule
     * @return Event
     */
    public function setSchedule(\Rozklad\UniversityBundle\Entity\Schedule $schedule = null)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \Rozklad\UniversityBundle\Entity\Schedule 
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Set auditory
     *
     * @param \Rozklad\UniversityBundle\Entity\Auditory $auditory
     * @return Event
     */
    public function setAuditory(\Rozklad\UniversityBundle\Entity\Auditory $auditory = null)
    {
        $this->auditory = $auditory;

        return $this;
    }

    /**
     * Get auditory
     *
     * @return \Rozklad\UniversityBundle\Entity\Auditory 
     */
    public function getAuditory()
    {
        return $this->auditory;
    }

    /**
     * Set subject
     *
     * @param \Rozklad\UniversityBundle\Entity\Subject $subject
     * @return Event
     */
    public function setSubject(\Rozklad\UniversityBundle\Entity\Subject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \Rozklad\UniversityBundle\Entity\Subject 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set teacher
     *
     * @param \Rozklad\UniversityBundle\Entity\Teacher $teacher
     * @return Event
     */
    public function setTeacher(\Rozklad\UniversityBundle\Entity\Teacher $teacher = null)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return \Rozklad\UniversityBundle\Entity\Teacher 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set group
     *
     * @param \Rozklad\UniversityBundle\Entity\Group $group
     * @return Event
     */
    public function setGroup(\Rozklad\UniversityBundle\Entity\Group $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Rozklad\UniversityBundle\Entity\Group 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
