<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher;

use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStoreInterface;

/**
 * Class TeacherRepository
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher
 */
class TeacherRepository extends EventSourcingRepository
{
    /**
     * @param EventStoreInterface $eventStore
     * @param EventBusInterface   $eventBus
     */
    public function __constructor(
        EventStoreInterface $eventStore,
        EventBusInterface $eventBus
    )
    {
        parent::__construct($eventStore, $eventBus, Teacher::class, new PublicConstructorAggregateFactory());
    }
}
