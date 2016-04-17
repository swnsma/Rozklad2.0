<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Event\FacultyBecameOutOfService;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Event\FacultyChangedTitle;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Event\FacultyCreated;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Event\FacultyReturnedToService;

/**
 * Class Faculty
 * @package Rozklad\CQRSBundle\Domain\Model
 */
class Faculty extends EventSourcedAggregateRoot
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
     * @var bool
     */
    private $outOfService;

    /**
     * @param $id
     * @param $title
     * @param $oos
     *
     * @return static
     */
    public static function create($id, $title, $oos)
    {
        $faculty =  new static();
        $faculty->apply(new FacultyCreated($id, $title, $oos));

        return $faculty;
    }

    /**
     * @param $title string
     */
    public function changeTitle($title)
    {
        if ($this->title == $title) {
            return;
        }

        $this->apply(new FacultyChangedTitle($this->id, $title));
    }

    /**
     * Mark faculty as not exists more.
     */
    public function becomeOutOfService()
    {
        if (!$this->outOfService) {
            $this->apply(new FacultyBecameOutOfService($this->id));
        }
    }

    /**
     * Mark faculty as exists.
     */
    public function returnToService()
    {
        if ($this->outOfService) {
            $this->apply(new FacultyReturnedToService($this->id));
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
     * @param FacultyCreated $event
     */
    public function applyFacultyCreated(FacultyCreated $event)
    {
        $this->id = $event->getId();
        $this->title = $event->getTitle();
        $this->outOfService = $event->isOutOfService();
    }

    /**
     * @param FacultyBecameOutOfService $event
     */
    public function applyFacultyBecameOutOfService(FacultyBecameOutOfService $event)
    {
        $this->outOfService = true;
    }

    /**
     * @param FacultyReturnedToService $event
     */
    public function applyFacultyReturnedToService(FacultyReturnedToService $event)
    {
        $this->outOfService = false;
    }

    /**
     * @param FacultyChangedTitle $event
     */
    public function applyFacultyChangedTitle(FacultyChangedTitle $event)
    {
        $this->title = $event->getTitle();
    }

}
