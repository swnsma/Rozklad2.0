<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Event\FacultyChangedTitle;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Event\FacultyCreated;

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
     * @param $id
     * @param $title
     *
     * @return static
     */
    public static function create($id, $title)
    {
        $faculty =  new static();
        $faculty->apply(new FacultyCreated($id, $title));

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
    }

    /**
     * @param FacultyChangedTitle $event
     */
    public function applyFacultyChangedTitle(FacultyChangedTitle $event)
    {
        $this->title = $event->getTitle();
    }

}
