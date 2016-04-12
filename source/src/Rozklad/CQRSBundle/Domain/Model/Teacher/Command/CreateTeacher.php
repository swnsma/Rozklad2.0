<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Command;

/**
 * Class CreateTeacher
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Command
 */
class CreateTeacher extends TeacherCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $chairId;

    /**
     * @var boolean
     */
    private $outOfService;

    /**
     * @param $id
     * @param $name
     * @param $chairId
     * @param bool|false $outOfService
     */
    public function __construct($id, $name, $chairId, $outOfService = false)
    {
        $this->name = $name;
        $this->chairId = $chairId;
        $this->outOfService = $outOfService;

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getChairId()
    {
        return $this->chairId;
    }

    /**
     * @return bool|false
     */
    public function getOutOfService()
    {
        return $this->outOfService;
    }
}