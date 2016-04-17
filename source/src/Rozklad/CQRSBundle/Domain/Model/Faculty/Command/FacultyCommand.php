<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Command;

/**
 * Class FacultyCommand
 * @package Rozklad\CQRSBundle\Domain\Model\Faculty\Command
 */
abstract class FacultyCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * FacultyCommand constructor.
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
