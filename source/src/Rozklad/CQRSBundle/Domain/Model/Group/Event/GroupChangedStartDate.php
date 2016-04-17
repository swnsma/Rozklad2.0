<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Event;

/**
 * Class GroupChangedStartDate
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Event
 */
class GroupChangedStartDate extends GroupEvent
{
    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * GroupChangedStartDate constructor.
     *
     * @param $id
     * @param $start
     */
    public function __construct($id, $start)
    {
        $this->startDate = $start;
        parent::__construct($id);
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['start']);
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'start' => $this->startDate
        ));
    }
}
