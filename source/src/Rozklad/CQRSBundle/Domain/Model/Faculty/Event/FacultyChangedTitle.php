<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Event;

/**
 * Class FacultyChangedTitle
 * @package Rozklad\CQRSBundle\Domain\Model\Faculty\Event
 */
class FacultyChangedTitle extends FacultyEvent
{
    /**
     * @var string
     */
    private $title;

    /**
     * CreateFacultyEvent constructor.
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
     * {@inheritdoc}
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'title' => $this->title
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['title']);
    }
}