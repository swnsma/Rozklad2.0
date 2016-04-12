<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Event;

/**
 * Class GroupCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Event
 */
class GroupCreated extends GroupEvent
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var string
     */
    private $notStudy;

    /**
     * GroupCreated constructor.
     *
     * @param $id
     * @param $title
     * @param $start
     * @param $end
     * @param $oos
     */
    public function __construct($id, $title, $start, $end, $oos)
    {
        $this->title = $title;
        $this->startDate = $start;
        $this->endDate = $end;
        $this->notStudy = $oos;

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return string
     */
    public function isNotStudy()
    {
        return $this->notStudy;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'title' => $this->title,
            'start' => $this->startDate,
            'end' => $this->endDate,
            'oos' => $this->notStudy
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['title'], $data['start'], $data['end'], $data['oos']);
    }
}
