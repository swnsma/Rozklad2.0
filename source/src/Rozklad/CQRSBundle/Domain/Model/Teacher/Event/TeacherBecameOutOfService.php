<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Event;

/**
 * Class TeacherBecameOutOfService
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Event
 */
class TeacherBecameOutOfService extends TeacherEvent
{
    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id']);
    }
}