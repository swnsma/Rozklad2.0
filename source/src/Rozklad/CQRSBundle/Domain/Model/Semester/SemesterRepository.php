<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStoreInterface;

/**
 * Class SemesterRepository
 * @package Rozklad\CQRSBundle\Domain\Model\Broadway
 */
class SemesterRepository extends EventSourcingRepository
{
    /**
     * @param EventStoreInterface $eventStore
     * @param EventBusInterface   $eventBus
     */
    public function __constructor(
        EventStoreInterface $eventStore,
        EventBusInterface $eventBus,
        $eventStreamDecorators
    ) {
        parent::__construct($eventStore, $eventBus, Semester::class, new PublicConstructorAggregateFactory(), $eventStreamDecorators);
    }
}
