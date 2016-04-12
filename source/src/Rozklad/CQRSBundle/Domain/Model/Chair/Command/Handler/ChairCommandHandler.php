<?php

namespace Rozklad\CQRSBundle\Domain\Model\Chair\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\Chair;
use Rozklad\CQRSBundle\Domain\Model\ChairRepository;
use Rozklad\CQRSBundle\Domain\Model\Chair\Command\CreateChair;

/**
 * Class ChairCommandHandler
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Command\Handler
 */
class ChairCommandHandler extends CommandHandler
{
    /**
     * @var ChairRepository
     */
    private $repository;

    /**
     * @param ChairRepository $repository
     */
    public function __construct(ChairRepository $repository)
    {
        $this->$repository = $repository;
    }

    public function handleCreateSemester(CreateChair $command)
    {
        /** @var Chair $chair */
        $chair = Chair::create($command->getId(), $command->getTitle());
        $this->repository->save($chair);
    }

    public function handleChangeTitle(Chair\Command\ChangeTitle $command)
    {
        /** @var Chair $chair */
        $chair = $this->repository->load($command->getId());
        $chair->changeTitle($command->getTitle());
        $this->repository->save($chair);
    }
}
