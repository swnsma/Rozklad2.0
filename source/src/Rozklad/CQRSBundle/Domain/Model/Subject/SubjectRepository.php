<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject;

use Broadway\EventSourcing\EventSourcingRepository;
use Broadway\EventHandling\EventBusInterface;
use Broadway\EventSourcing\AggregateFactory\PublicConstructorAggregateFactory;
use Broadway\EventStore\EventStoreInterface;

/**
 * Class SubjectRepository
 * @package Rozklad\CQRSBundle\Domain\Model\Subject
 */
class SubjectRepository extends EventSourcingRepository
{
    /**
     * @param EventStoreInterface $eventStore
     * @param EventBusInterface   $eventBus
     * @param                     $eventStreamDecorators
     */
    public function __constructor(
        EventStoreInterface $eventStore,
        EventBusInterface $eventBus,
        $eventStreamDecorators
    )
    {
        parent::__construct($eventStore, $eventBus, Subject::class, new PublicConstructorAggregateFactory(), $eventStreamDecorators);
    }
}
