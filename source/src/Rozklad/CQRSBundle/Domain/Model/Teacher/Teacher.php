<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Event\TeacherBecameOutOfService;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Event\TeacherChangedChair;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Event\TeacherChangedName;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Event\TeacherCreated;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Event\TeacherReturnedToService;

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
            new TeacherCreated($id, $name, $chairId, $outOfService)
        );

        return $teacher;
    }

    /**
     * Change teacher's name.
     *
     * @param $newName
     */
    public function changeName($newName)
    {
        if ($this->name == $newName) {
            return;
        }

        $this->apply(new TeacherChangedName($this->id, $newName));
    }

    /**
     * Change teacher chair.
     *
     * @param $newChairId
     */
    public function changeChair($newChairId)
    {
        if ($this->chairId == $newChairId) {
            return ;
        }

        $this->apply(new TeacherChangedChair($this->id, $newChairId));
    }

    /**
     * Mark teacher as out of service.
     */
    public function becomeOutOfService()
    {
        if ($this->outOfService == true) {
            return;
        }
        $this->apply(new TeacherBecameOutOfService($this->id));
    }

    /**
     * Mark teacher as in service.
     */
    public function returnToService()
    {
        if ($this->outOfService == false) {
           return;
        }

        $this->apply(new TeacherReturnedToService($this->id));
    }

    /**
     * Apply create teacher event.
     *
     * @param TeacherCreated $event
     */
    public function applyTeacherCreated(TeacherCreated $event)
    {
        $this->id = $event->getId();
        $this->name = $event->getName();
        $this->chairId = $event->getChairId();
        $this->outOfService = $event->getOutOfService();
    }

    /**
     * Apply change chair event.
     *
     * @param TeacherChangedChair $event
     */
    public function applyTeacherChangedChair(TeacherChangedChair $event)
    {
        $this->chairId = $event->getChairId();
    }

    /**
     * @param TeacherBecameOutOfService $event
     */
    public function applyTeacherBecameOutOfService(TeacherBecameOutOfService $event)
    {
        $this->outOfService = true;
    }

    /**
     * @param TeacherReturnedToService $event
     */
    public function applyTeacherReturnedToService(TeacherReturnedToService $event)
    {
        $this->outOfService = false;
    }
}