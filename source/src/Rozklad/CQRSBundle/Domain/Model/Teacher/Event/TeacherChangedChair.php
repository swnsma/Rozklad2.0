<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Event;

/**
 * Class TeacherChangedChair
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Event
 */
class TeacherChangedChair extends TeacherEvent
{
    /**
     * @var string
     */
    private $chairId;

    /**
     * TeacherChangedChair constructor.
     *
     * @param $id
     * @param $chairId
     */
    public function __construct($id, $chairId)
    {
        $this->chairId = $chairId;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getChairId()
    {
        return $this->chairId;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'chairId' => $this->chairId
        ));
    }

    /**
     * @param array $data
     *
     * @return static
     */
    public static function deserialize(array $data)
    {
       return new static(
           $data['id'],
           $data['chairId']
       );
    }
}
