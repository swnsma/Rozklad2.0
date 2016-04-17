<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group;

use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventStore\EventStoreInterface;

/**
 * Class GroupRepository
 * @package Rozklad\CQRSBundle\Domain\Model\Group
 */
class GroupRepository extends EventSourcingRepository
{
    /**
     * GroupRepository constructor.
     *
     * @param EventStoreInterface $eventStore
     * @param EventBusInterface   $eventBus
     * @param string              $eventStreamDecorators
     */
    public function __construct(
        EventStoreInterface $eventStore,
        EventBusInterface $eventBus,
        $eventStreamDecorators
    )
    {
        parent::__construct($eventStore, $eventBus, Group::class, new PublicConstructorAggregateFactory(), $eventStreamDecorators);
    }
}
