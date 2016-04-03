<?php

namespace Rozklad\CQRSBundle\Domain\Model\Semester\Command;

/**
 * Class CreateSemester
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Command
 */
class CreateSemester
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
