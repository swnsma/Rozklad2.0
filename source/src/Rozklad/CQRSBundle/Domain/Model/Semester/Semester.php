<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Semester\Event\CreateSemesterEvent;

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
     * @return static
     */
    public static function create($id, $from, $to) {
        $semester =  new static();
        $semester->apply(new CreateSemesterEvent($id, $from, $to));

        return $semester;
    }

    /**
     * @param CreateSemesterEvent $event
     */
    public function applyCreateSemesterEvent(CreateSemesterEvent $event)
    {
        $this->id = $event->id;
        $this->from = $event->from;
        $this->to = $event->to;
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }
}
