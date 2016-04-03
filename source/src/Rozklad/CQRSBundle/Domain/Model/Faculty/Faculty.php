<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;

/**
 * Class Faculty
 * @package Rozklad\CQRSBundle\Domain\Model
 */
class Faculty extends EventSourcedAggregateRoot
{
    private $id;
    private $title;

    private $groups = [];

    /**
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {
        $this->title = $title;
        $this->id = $id;
    }

    /**
     * @param $id
     * @param $title
     * @return static
     */
    public static function create($id, $title)
    {
        return new static($id, $title);
    }

    /**
     * @return string
     */
    public function getAggregateRootId()
    {
        return $this->id;
    }

}
