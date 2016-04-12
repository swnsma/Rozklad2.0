<?php

namespace Rozklad\CQRSBundle\Domain\Model\Semester\Command;

/**
 * Class CreateSemester
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Command
 */
class CreateSemester extends SemesterCommand
{
    /**
     * @var \DateTime
     */
    private $from;

    /**
     * @var \DateTime
     */
    private $to;

    /**
     * @param $id
     * @param $from
     * @param $to
     */
    public function __construct($id, $from, $to)
    {
        $this->from = $from;
        $this->to = $to;

        parent::__construct($id);
    }

    /**
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->from;
    }

    /**
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->to;
    }
}
