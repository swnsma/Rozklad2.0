<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Command;

/**
 * Class CreateSubject
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Command
 */
class CreateSubject extends SubjectCommand
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $outOfService;

    /**
     * @var string
     */
    private $chairId;

    /**
     * CreateSubject constructor.
     *
     * @param string     $id
     * @param            $title
     * @param            $chairId
     * @param bool|false $oos
     */
    public function __construct($id, $title, $chairId, $oos = false)
    {
        $this->title = $title;
        $this->chairId = $chairId;
        $this->outOfService = $oos;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getChairId()
    {
        return $this->chairId;
    }

    /**
     * @return bool
     */
    public function isOutOfService()
    {
        return $this->outOfService;
    }
}