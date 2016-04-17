<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Command;

class ChangeSubjectChair extends SubjectCommand
{
    /**
     * @var string
     */
    private $chairId;

    /**
     * ChangeSubjectChair constructor.
     *
     * @param string $id
     * @param string $chairId
     */
    public function __construct($id, $chairId)
    {
        $this->chairId = $chairId;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getChair()
    {
        return $this->chairId;
    }
}
