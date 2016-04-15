<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Event;

/**
 * Class SubjectBecameOutOfService
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Event
 */
class SubjectBecameOutOfService extends SubjectEvent
{
    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id']);
    }
}