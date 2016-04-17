<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Event;

/**
 * Class FacultyCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Faculty\Event
 */
class FacultyCreated extends FacultyEvent
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
     * FacultyCreated constructor.
     *
     * @param $id
     * @param $title
     * @param $oos\
     */
    public function __construct($id, $title, $oos)
    {
        $this->title = $title;
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
            'title' => $this->title,
            'oos' => $this->outOfService
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['title'], $data['oos']);
    }
}
