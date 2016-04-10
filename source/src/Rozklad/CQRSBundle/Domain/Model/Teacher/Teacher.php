<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Event\CreateTeacherEvent;

/**
 * Class Teacher
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher
 */
class Teacher extends EventSourcedAggregateRoot
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $chairId;

    /**
     * @var boolean
     */
    private $outOfService;

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @param $name
     * @param $chairId
     * @param $outOfService
     * @return static
     */
    public static function create($id, $name, $chairId, $outOfService)
    {
        $teacher = new static();
        $teacher->apply(
            new CreateTeacherEvent($id, $name, $chairId, $outOfService)
        );

        return $teacher;
    }

    /**
     * Apply create teacher event.
     *
     * @param CreateTeacherEvent $event
     */
    public function applyCreateTeacherEvent(CreateTeacherEvent $event)
    {
        $this->id = $event->id;
        $this->name = $event->name;
        $this->chairId = $event->chairId;
        $this->outOfService = $event->outOfService;
    }
}