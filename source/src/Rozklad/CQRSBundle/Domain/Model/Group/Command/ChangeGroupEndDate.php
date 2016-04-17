<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Command;

/**
 * Class ChangeGroupEndDate
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Command
 */
class ChangeGroupEndDate extends GroupCommand
{
    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * ChangeGroupEndDate constructor.
     *
     * @param $id
     * @param $endDate
     */
    public function __construct($id, $endDate)
    {
        $this->endDate = $endDate;
        parent::__construct($id);
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
}
