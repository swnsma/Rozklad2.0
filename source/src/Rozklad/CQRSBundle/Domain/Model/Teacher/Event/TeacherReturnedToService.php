<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Event;

/**
 * Class TeacherReturnedToService
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Event
 */
class TeacherReturnedToService extends TeacherEvent
{
    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id']);
    }
}
