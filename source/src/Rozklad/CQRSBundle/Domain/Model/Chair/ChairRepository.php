<?php

namespace Rozklad\CQRSBundle\Domain\Model;

use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStoreInterface;

/**
 * Class ChairRepository
 * @package Rozklad\CQRSBundle\Domain\Model
 */
class ChairRepository extends EventSourcingRepository
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
        parent::__construct($eventStore, $eventBus, Chair::class, new PublicConstructorAggregateFactory());
    }
}
