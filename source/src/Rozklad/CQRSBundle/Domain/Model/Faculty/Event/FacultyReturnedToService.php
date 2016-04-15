<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Event;

/**
 * Class FacultyReturnedToService
 * @package Rozklad\CQRSBundle\Domain\Model\Faculty\Event
 */
class FacultyReturnedToService extends FacultyEvent
{

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static($data['id']);
    }
}