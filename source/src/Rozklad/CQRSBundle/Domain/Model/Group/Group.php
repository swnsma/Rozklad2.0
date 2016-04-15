<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Group\Event\GroupChangedEndDate;
use Rozklad\CQRSBundle\Domain\Model\Group\Event\GroupChangedStartDate;
use Rozklad\CQRSBundle\Domain\Model\Group\Event\GroupChangedTitle;
use Rozklad\CQRSBundle\Domain\Model\Group\Event\GroupCreated;
use Rozklad\CQRSBundle\Domain\Model\Group\Event\GroupRemovedFromStudy;
use Rozklad\CQRSBundle\Domain\Model\Group\Event\GroupReturnedToStudy;

/**
 * Class Group
 * @package Rozklad\CQRSBundle
 */
class Group extends EventSourcedAggregateRoot
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
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var bool
     */
    private $notStudy;

    /**
     * @param $id
     * @param $title
     * @param $startDate
     * @param $endDate
     * @param $notStudy
     *
     * @return static
     */
    public static function create($id, $title, $startDate, $endDate, $notStudy)
    {
        $group = new static();

        $now = new \DateTime();

        if (!$notStudy && $endDate < $now) {
            $notStudy = true;
        }

        $group->apply(new GroupCreated($id, $title, $startDate, $endDate, $notStudy));

        return $group;
    }

    /**
     * @param $title
     */
    public function changeTitle($title)
    {
        if ($this->title == $title) {
            return;
        }

        $this->apply(new GroupChangedTitle($this->id, $title));
    }

    /**
     * @param $startDate
     */
    public function changeStartDate($startDate)
    {
        if ($this->startDate == $startDate) {
            return;
        }

        $this->apply(new GroupChangedStartDate($this->id, $startDate));
    }

    /**
     * @param $endDate
     */
    public function changeEndDate($endDate)
    {
        if ($this->endDate == $endDate) {
            return;
        }

        $this->apply(new GroupChangedEndDate($this->id, $endDate));
        $now = new \DateTime();
        if ($this->endDate < $now) {
            $this->apply(new GroupRemovedFromStudy($this->id));
        }
    }

    /**
     * Mark group as not in study.
     */
    public function removeFromStudy()
    {
        $this->apply(new GroupRemovedFromStudy($this->id));
    }

    /**
     * Mark group as in study.
     */
    public function returnToStudy()
    {
        $now = new \DateTime();
        if ($this->endDate > $now) {
            $this->apply(new GroupReturnedToStudy($this->id));
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
     * @param GroupCreated $event
     */
    public function applyGroupCreate(GroupCreated $event)
    {
        $this->id = $event->getId();
        $this->title = $event->getTitle();
        $this->endDate = $event->getEndDate();
        $this->startDate = $event->getStartDate();
        $this->notStudy = $event->isNotStudy();
    }

    /**
     * @param GroupChangedEndDate $event
     */
    public function applyGroupChangedEndDate(GroupChangedEndDate $event)
    {
        $this->endDate = $event->getEndDate();
    }

    /**
     * @param GroupChangedStartDate $event
     */
    public function applyGroupChangedStartDate(GroupChangedStartDate $event)
    {
        $this->startDate = $event->getStartDate();
    }

    /**
     * @param GroupChangedTitle $event
     */
    public function applyGroupChangedTitle(GroupChangedTitle $event)
    {
        $this->title = $event->getTitle();
    }

    /**
     * @param GroupRemovedFromStudy $event
     */
    public function applyGroupRemovedFromStudy(GroupRemovedFromStudy $event)
    {
        $this->notStudy = true;
    }

    /**
     * @param GroupReturnedToStudy $event
     */
    public function applyGroupReturnedToStudy(GroupReturnedToStudy $event)
    {
        $this->notStudy = false;
    }
}
