<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Event;

/**
 * Class GroupChangedEndDate
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Event
 */
class GroupChangedEndDate extends GroupEvent
{
    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * GroupChangedEndDate constructor.
     *
     * @param $id
     * @param $endDate
     */
    public function __construct($id, $endDate)
    {
        $this->endDate = $endDate;
        parent::__construct($id);
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'end' => $this->endDate
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['end']);
    }
}