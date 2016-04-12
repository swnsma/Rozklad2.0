<?php

namespace Rozklad\CQRSBundle\Domain\Model\Faculty\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\Faculty;
use Rozklad\CQRSBundle\Domain\Model\FacultyRepository;
use Rozklad\CQRSBundle\Domain\Model\Faculty\Command\CreateFaculty;

/**
 * Class FacultyCommandHandler
 * @package Rozklad\CQRSBundle\Domain\Model\Faculty\Command\Handler
 */
class FacultyCommandHandler extends CommandHandler
{
    /**
     * @var FacultyRepository
     */
    private $repository;

    /**
     * @param FacultyRepository $repository
     */
    public function __construct(FacultyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateFaculty $command
     */
    public function handleCreateFaculty(CreateFaculty $command)
    {
        $faculty = Faculty::create($command->getId(), $command->getTitle());
        $this->repository->save($faculty);
    }

    /**
     * @param Faculty\Command\ChangeFacultyTitle $command
     */
    public function handleChangeFacultyTitle(Faculty\Command\ChangeFacultyTitle $command)
    {
        /** @var Faculty $faculty */
        $faculty = $this->repository->load($command->getId());
        $faculty->changeTitle($command->getTitle());
        $this->repository->save($faculty);
    }
}
