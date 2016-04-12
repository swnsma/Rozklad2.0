<?php

namespace Rozklad\CQRSBundle\Domain\Model\Chair\Event;

use Broadway\Serializer\SerializableInterface;

/**
 * Class ChairEvent
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Event
 */
abstract class ChairEvent implements SerializableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * ChairEvent constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
       return array('id' => $this->id);
    }
}