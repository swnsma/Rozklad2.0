<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Event;

/**
 * Class SubjectTitleChanged
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Event
 */
class SubjectTitleChanged extends SubjectEvent
{
    /**
     * @var string
     */
    private $title;

    /**
     * SubjectTitleChanged constructor.
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
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new self($data['id'], $data['title']);
    }
}
