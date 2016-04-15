<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Event;

/**
 * Class SubjectReturnedToService
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Event
 */
class SubjectReturnedToService extends SubjectEvent
{
    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new self($data['id']);
    }
}