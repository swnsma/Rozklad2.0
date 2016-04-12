<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStoreInterface;

/**
 * Class FacultyRepository
 * @package Rozklad\CQRSBundle\Domain\Model
 */
class FacultyRepository extends EventSourcingRepository
{
    /**
     * @param EventStoreInterface $eventStore
     * @param EventBusInterface   $eventBus
     */
    public function __constructor(
        EventStoreInterface $eventStore,
        EventBusInterface $eventBus,
        $eventStreamDecorators
    )
    {
        parent::__construct($eventStore, $eventBus, Faculty::class, new PublicConstructorAggregateFactory(),$eventStreamDecorators);
    }
}
