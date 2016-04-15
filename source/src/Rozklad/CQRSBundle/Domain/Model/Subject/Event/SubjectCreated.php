<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Event;

/**
 * Class SubjectCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Event
 */
class SubjectCreated extends SubjectEvent
{

    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $outOfService;

    /**
     * @var string
     */
    private $chairId;

    /**
     * SubjectCreated constructor.
     *
     * @param $id
     * @param $title
     * @param $chairId
     * @param $oos
     */
    public function __construct($id, $title, $chairId, $oos)
    {
        $this->title = $title;
        $this->chairId = $chairId;
        $this->outOfService = $oos;
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
     * @return string
     */
    public function getCharId()
    {
        return $this->chairId;
    }

    /**
     * @return bool
     */
    public function isOutOfService()
    {
        return $this->outOfService;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
          'chairId' => $this->chairId,
            'title' => $this->title,
            'oos' => $this->outOfService
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['title'], $data['chairId'], $data['oos']);
    }
}