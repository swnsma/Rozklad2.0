<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Command;

/**
 * Class CreateFaculty
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Command
 */
class CreateFaculty extends FacultyCommand
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $outOfService;

    /**
     * CreateFaculty constructor.
     *
     * @param            $id
     * @param            $title
     * @param bool|false $oos
     */
    public function __construct($id, $title, $oos = false)
    {
        $this->title = $title;
        $this->outOfService = $oos;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isOutOfService()
    {
        return $this->outOfService;
    }
}
