<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventSourcing\EventSourcedAggregateRoot;

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

    private $teachers = [];
    private $subjects = [];

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
