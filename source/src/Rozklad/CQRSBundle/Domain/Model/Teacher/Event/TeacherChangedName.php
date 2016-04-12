<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Event;

/**
 * Class TeacherChangedName
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Event
 */
class TeacherChangedName extends TeacherEvent
{
    /**
     * @var string
     */
    private $name;

    /**
     * TeacherChangedName constructor.
     *
     * @param $id
     * @param $name
     */
    public function __construct($id, $name)
    {
        $this->name = $name;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'name' => $this->name
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static(
            $data['id'],
            $data['name']
        );
    }
}