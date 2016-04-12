<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Event;

/**
 * Class CreateFacultyEvent
 * @package Rozklad\CQRSBundle\Domain\Model\Faculty\Event
 */
class CreateFacultyEvent
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * CreateFacultyEvent constructor.
     *
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}