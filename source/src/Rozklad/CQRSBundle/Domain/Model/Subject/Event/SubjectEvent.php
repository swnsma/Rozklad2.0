<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Event;

use Broadway\Serializer\SerializableInterface;

/**
 * Class SubjectEvent
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Event
 */
abstract class SubjectEvent implements  SerializableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * SubjectEvent constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

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
