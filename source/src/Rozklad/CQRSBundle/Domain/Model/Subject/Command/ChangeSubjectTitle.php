<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Command;

/**
 * Class ChangeSubjectTitle
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Command
 */
class ChangeSubjectTitle extends SubjectCommand
{
    /**
     * @var string
     */
    private $title;

    /**
     * ChangeSubjectTitle constructor.
     *
     * @param string $id
     * @param        $title
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