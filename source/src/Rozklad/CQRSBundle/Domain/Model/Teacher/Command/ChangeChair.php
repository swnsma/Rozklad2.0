<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Command;

/**
 * Class ChangeChair
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Command
 */
class ChangeChair extends TeacherCommand
{
    /**
     * @var string
     */
    private $chairId;

    /**
     * ChangeChair constructor.
     *
     * @param $id
     * @param $chairId
     */
    public function __construct($id, $chairId)
    {
        $this->chairId = $chairId;

        parent::__construct($id);
    }

    /**
     * @return mixed
     */
    public function getChairId()
    {
        return $this->getChairId();
    }

}
