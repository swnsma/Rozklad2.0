<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Event\CreateFacultyEvent;

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
        $faculty->apply(new CreateFacultyEvent($id, $title));

        return $faculty;
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }

    /**
     * @param CreateFacultyEvent $event
     */
    public function applyCreateFacultyEvent(CreateFacultyEvent $event)
    {
        $this->id = $event->id;
        $this->title = $event->title;
    }

}
