<?php

namespace Rozklad\CQRSBundle\Domain\Model\Semester\Event;

use Broadway\Serializer\SerializableInterface;

/**
 * Class SemesterEvent
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Event
 */
abstract class SemesterEvent implements SerializableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * SemesterEvent constructor.
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
        return array('id' => $this->id);
    }
}
