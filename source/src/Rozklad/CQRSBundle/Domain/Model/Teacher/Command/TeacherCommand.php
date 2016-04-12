<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Command;

/**
 * Class TeacherCommand
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Command
 */
abstract class TeacherCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * TeacherCommand constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}