<?php

namespace Rozklad\CQRSBundle\Domain\Model\Chair\Command;

/**
 * Class ChangeTitle
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Command
 */
class ChangeTitle extends ChairCommand
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
