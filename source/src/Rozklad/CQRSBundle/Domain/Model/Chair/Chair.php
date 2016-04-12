<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;
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
     * @param ChairCreated $event
     */
    public function applyCreateChairEvent(ChairCreated $event)
    {
        $this->id = $event->id;
        $this->title = $event->title;
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }
}
