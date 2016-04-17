<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Event;

/**
 * Class GroupReturnedToStudy
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Event
 */
class GroupReturnedToStudy extends GroupEvent
{
    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id']);
    }
}
