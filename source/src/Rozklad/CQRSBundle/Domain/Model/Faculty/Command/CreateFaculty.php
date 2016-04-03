<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Command;

/**
 * Class CreateFaculty
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Command
 */
class CreateFaculty
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}
