<?php

namespace Rozklad\CQRSBundle\Domain\Model\Chair\Command;

/**
 * Class ChairCommand
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Command
 */
abstract class ChairCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * ChairCommand constructor.
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
