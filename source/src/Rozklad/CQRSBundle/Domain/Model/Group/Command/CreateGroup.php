<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Command;

/**
 * Class CreateGroup
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Command
 */
class CreateGroup extends GroupCommand
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var bool|false
     */
    private $notStudy;

    /**
     * CreateGroup constructor.
     *
     * @param            $id
     * @param            $title
     * @param            $startDate
     * @param            $endDate
     * @param bool|false $notStudy
     */
    public function __construct($id, $title, $startDate, $endDate, $notStudy = false)
    {
        $this->title = $title;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->notStudy = $notStudy;

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
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return bool|false
     */
    public function isNotStudy()
    {
        return $this->notStudy;
    }

}