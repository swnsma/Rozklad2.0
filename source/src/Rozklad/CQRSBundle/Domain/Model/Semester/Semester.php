<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;

/**
 * Class Semester
 * @package Rozklad\CQRSBundle\Domain\Model
 */
class Semester extends EventSourcedAggregateRoot
{
    /**
     * @var string
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

    private $lessons = [];

    /**
     * @param $id
     * @param $from
     * @param $to
     */
    public function __construct($id, $from, $to)
    {
        $this->from = $from;
        $this->to = $to;
        $this->id = $id;
    }

    /**
     * @param $id
     * @param $from
     * @param $to
     * @return static
     */
    public static function create($id, $from, $to) {
        return new static($id, $from, $to);
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }
}
