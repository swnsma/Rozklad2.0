<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
use Rozklad\CQRSBundle\Domain\Model\Chair\Event\ChairChangedTitle;
use Rozklad\CQRSBundle\Domain\Model\Chair\Event\ChairCreated;

/**
 * Class Chair
 * @package Rozklad\CQRSBundle\Domain\Model
 */
class Chair extends EventSourcedAggregateRoot
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
     * @return static
     */
    public static function create($id, $title)
    {
        $chair = new static();
        $chair->apply(new ChairCreated($id, $title));
        return $chair;
    }

    /**
     * @param $title
     */
    public function changeTitle($title)
    {
        if ($this->title == $title) {
            return;
        }

        $this->apply(new ChairChangedTitle($this->id, $title));
    }

    /**
     * @param ChairCreated $event
     */
    public function applyChairCreated(ChairCreated $event)
    {
        $this->id = $event->getId();
        $this->title = $event->getTitle();
    }

    /**
     * @param ChairChangedTitle $event
     */
    public function applyChairChangedTitle(ChairChangedTitle $event)
    {
        $this->title = $event->getTitle();
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }
}
