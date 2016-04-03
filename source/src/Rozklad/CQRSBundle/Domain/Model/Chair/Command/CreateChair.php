<?php

namespace Rozklad\CQRSBundle\Domain\Model\Chair\Command;

/**
 * Class CreateChair
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Command
 */
class CreateChair
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
