<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Subject\Event\SubjectBecameOutOfService;
use Rozklad\CQRSBundle\Domain\Model\Subject\Event\SubjectChairChanged;
use Rozklad\CQRSBundle\Domain\Model\Subject\Event\SubjectCreated;
use Rozklad\CQRSBundle\Domain\Model\Subject\Event\SubjectReturnedToService;
use Rozklad\CQRSBundle\Domain\Model\Subject\Event\SubjectTitleChanged;

/**
 * Class Subject
 * @package Rozklad\CQRSBundle\Domain\Model\Subject
 */
class Subject extends EventSourcedAggregateRoot
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $chairId;

    /**
     * @var bool
     */
    private $outOfService;

    /**
     * Create subject entity.
     *
     * @param $id
     * @param $title
     * @param $chairId
     * @param $oos
     *
     * @return static
     */
    public static function create($id, $title, $chairId, $oos)
    {
        $subject = new static();
        $subject->apply(new SubjectCreated($id, $title, $chairId, $oos));
        return $subject;
    }

    /**
     * @param $title
     */
    public function changeTitle($title)
    {
        if ($this->title != $title) {
            $this->apply(new SubjectTitleChanged($this->id, $this->title));
        }
    }

    /**
     * @param $chairId
     */
    public function changeChairId($chairId)
    {
        if ($this->chairId != $chairId) {
            $this->apply(new SubjectChairChanged($this->id, $chairId));
        }
    }

    /**
     * Mark subject as not in service.
     */
    public function becomeOutOfService()
    {
        if (!$this->outOfService) {
            $this->apply(new SubjectBecameOutOfService($this->id));
        }
    }

    /**
     * Mark subject as in service.
     */
    public function returnToService()
    {
        if ($this->outOfService) {
            $this->apply(new SubjectReturnedToService($this->id));
        }
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }

    /**
     * @param SubjectCreated $event
     */
    public function applySubjectCreated(SubjectCreated $event)
    {
        $this->id = $event->getId();
        $this->title = $event->getTitle();
        $this->chairId = $event->getCharId();
        $this->outOfService = $event->isOutOfService();
    }

    /**
     * @param SubjectReturnedToService $event
     */
    public function applySubjectReturnedToService(SubjectReturnedToService $event)
    {
        $this->outOfService = false;
    }

    /**
     * @param SubjectBecameOutOfService $event
     */
    public function applySubjectBecameOutOfService(SubjectBecameOutOfService $event)
    {
        $this->outOfService = true;
    }

    /**
     * @param SubjectTitleChanged $event
     */
    public function applySubjectTitleChanged(SubjectTitleChanged $event)
    {
        $this->title = $event->getTitle();
    }

    /**
     * @param SubjectChairChanged $event
     */
    public function applySubjectChairChanged(SubjectChairChanged $event)
    {
        $this->chairId = $event->getChairId();
    }
}