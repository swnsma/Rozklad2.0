<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Command;

/**
 * Class ChangeFacultyTitle
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Command
 */
class ChangeFacultyTitle extends FacultyCommand
{
    /**
     * @var string
     */
    private $title;

    /**
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {
        $this->title = $title;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
