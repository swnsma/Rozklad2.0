<?php

namespace Rozklad\CQRSBundle\Domain\Model\Semester\Command;

/**
 * Class SemesterCommand
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Command
 */
abstract class SemesterCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * SemesterCommand constructor.
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