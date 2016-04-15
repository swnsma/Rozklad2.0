<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Event;

/**
 * Class SubjectChairChanged
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Event
 */
class SubjectChairChanged extends SubjectEvent
{

    /**
     * @var string
     */
    private $chairId;

    /**
     * SubjectChairChanged constructor.
     *
     * @param $id
     * @param $chairId\
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
     * {@inheritdoc}
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'chairId' => $this->chairId
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['chairId']);
    }
}
