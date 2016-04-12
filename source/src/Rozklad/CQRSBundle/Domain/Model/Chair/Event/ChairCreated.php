<?php
namespace Rozklad\CQRSBundle\Domain\Model\Chair\Event;

/**
 * Class ChairCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Event
 */
class ChairCreated
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
     * CreateChairEvent constructor.
     *
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}