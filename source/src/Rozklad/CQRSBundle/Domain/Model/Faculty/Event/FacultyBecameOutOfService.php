<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Event;

/**
 * Class FacultyBecameOutOfService
 * @package Rozklad\CQRSBundle\Domain\Model\Faculty\Event
 */
class FacultyBecameOutOfService extends FacultyEvent
{

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id']);
    }
}
