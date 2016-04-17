<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Event;

use Broadway\Serializer\SerializableInterface;

abstract class FacultyEvent implements SerializableInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * FacultyEvent constructor.
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

    public function serialize()
    {
        return array('id' => $this->id);
    }
}
