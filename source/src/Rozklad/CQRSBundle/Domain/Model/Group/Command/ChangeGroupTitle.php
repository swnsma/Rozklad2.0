<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Command;

/**
 * Class ChangeGroupTitle
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Command
 */
class ChangeGroupTitle extends GroupCommand
{
    /**
     * @var string
     */
    private $title;

    /**
     * ChangeGroupTitle constructor.
     *
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {
        $this->title = $title;
        parent::__construct($id);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}
