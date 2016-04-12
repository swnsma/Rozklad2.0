<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Event;

/**
 * Class GroupRemovedFromStudy
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Event
 */
class GroupRemovedFromStudy extends GroupEvent
{
    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id']);
    }
}