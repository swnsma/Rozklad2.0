<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Command;

/**
 * Class ChangeTeacherName
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Command
 */
class ChangeTeacherName extends TeacherCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * ChangeName constructor.
     *
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->name = $name;

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
