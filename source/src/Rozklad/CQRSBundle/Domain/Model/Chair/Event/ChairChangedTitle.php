<?php

namespace Rozklad\CQRSBundle\Domain\Model\Chair\Event;

/**
 * Class ChairChangedTitle
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Event
 */
class ChairChangedTitle extends ChairEvent
{
    /**
     * @var string
     */
    private $title;

    /**
     * ChairChangedTitle constructor.
     *
     * @param $id
     * @param $title
     */
    public function __construct($id, $title)
    {
        $this->title = $title;
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
     * @return array
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'title' => $this->title
        ));
    }

    /**
     * @return mixed The object instance
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['title']);
    }
}