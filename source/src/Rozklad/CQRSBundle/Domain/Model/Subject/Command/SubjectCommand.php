<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Command;

/**
 * Class SubjectCommand
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Command
 */
abstract class SubjectCommand
{
    /**
     * @var string
     */
    private $id;

    /**
     * SubjectCommand constructor.
     *
     * @param $id string
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