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
        $faculty = Faculty::create($command->getId(), $command->getTitle(), $command->isOutOfService());
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

    /**
     * @param Faculty\Command\BecomeFacultyOutOfService $command
     */
    public function handleBecomeFacultyOutOfService(Faculty\Command\BecomeFacultyOutOfService $command)
    {
        /** @var Faculty $faculty */
        $faculty = $this->repository->load($command->getId());
        $faculty->becomeOutOfService();
        $this->repository->save($faculty);
    }

    /**
     * @param Faculty\Command\ReturnFacultyToService $command
     */
    public function handleReturnFacultyToService(Faculty\Command\ReturnFacultyToService $command)
    {
        /** @var Faculty $faculty */
        $faculty = $this->repository->load($command->getId());
        $faculty->returnToService();
        $this->repository->save($faculty);
    }
}
