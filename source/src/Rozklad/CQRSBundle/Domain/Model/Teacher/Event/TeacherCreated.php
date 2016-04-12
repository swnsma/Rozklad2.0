<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Event;

/**
 * Class TeacherCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Event
 */
class TeacherCreated
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $chairId;

    /**
     * @var boolean
     */
    public $outOfService;

    /**
     * CreateTeacherEvent constructor.
     *
     * @param $id
     * @param $name
     * @param $chairId
     * @param $oos
     */
    public function __construct($id, $name, $chairId, $oos)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chairId = $chairId;
        $this->outOfService = $oos;
    }
}