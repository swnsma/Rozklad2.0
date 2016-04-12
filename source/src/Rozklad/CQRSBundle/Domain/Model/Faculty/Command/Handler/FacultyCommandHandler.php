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
        $semester = Faculty::create($command->getId(), $command->getTitle());
        $this->repository->save($semester);
    }

    /**
     * @param Faculty\Command\ChangeTitle $command
     */
    public function handleChangeTitle(Faculty\Command\ChangeTitle $command)
    {
        /** @var Faculty $faculty */
        $faculty = $this->repository->load($command->getId());
        $faculty->changeTitle($command->getTitle());
        $this->repository->save($faculty);
    }
}
