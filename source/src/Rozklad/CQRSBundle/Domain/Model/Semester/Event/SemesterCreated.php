<?php

namespace Rozklad\CQRSBundle\Domain\Model\Semester\Event;

/**
 * Class SemesterCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Event
 */
class SemesterCreated
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var \DateTime
     */
    public $from;

    /**
     * @var \DateTime
     */
    public $to;

    /**
     * CreateSemesterEvent constructor.
     *
     * @param $id
     * @param $from
     * @param $to
     */
    public function __construct($id, $from, $to)
    {
        $this->id = $id;
        $this->from = $from;
        $this->to = $to;
    }
}