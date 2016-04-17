<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Event;

/**
 * Class GroupChangedTitle
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Event
 */
class GroupChangedTitle extends GroupEvent
{
    /**
     * @var string
     */
    private $title;

    /**
     * GroupChangeTitle constructor.
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
