<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Command;

/**
 * Class CreateTeacher
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Command
 */
class CreateTeacher
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
     * @param $id
     * @param $name
     * @param $chairId
     * @param bool|false $outOfService
     */
    public function __construct($id, $name, $chairId, $outOfService = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->chairId = $chairId;
        $this->outOfService = $outOfService;
    }
}