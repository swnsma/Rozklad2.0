<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Command;

/**
 * Class ChangeGroupStartDate
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Command
 */
class ChangeGroupStartDate extends GroupCommand
{
    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * ChangeGroupEndDate constructor.
     *
     * @param $id
     * @param $startDate
     */
    public function __construct($id, $startDate)
    {
        $this->startDate = $startDate;
        parent::__construct($id);
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
}
