<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Command;

/**
 * Class GroupCommand
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Command
 */
abstract class GroupCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * GroupCommand constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}
