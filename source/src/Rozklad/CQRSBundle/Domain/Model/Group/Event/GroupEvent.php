<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Event;

use Broadway\Serializer\SerializableInterface;

/**
 * Class GroupEvent
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Event
 */
abstract class GroupEvent implements SerializableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * GroupEvent constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    public function serialize()
    {
       return array(
           'id' => $this->id
       );
    }
}