<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Event;

use Broadway\Serializer\SerializableInterface;

/**
 * Class TeacherEvent
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Event
 */
abstract class TeacherEvent implements SerializableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * TeacherEvent constructor.
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

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return array('id' => (string) $this->id);
    }
}
