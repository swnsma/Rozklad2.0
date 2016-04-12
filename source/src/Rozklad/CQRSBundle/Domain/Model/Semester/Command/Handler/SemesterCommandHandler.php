<?php

namespace Rozklad\CQRSBundle\Domain\Model\Semester\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\SemesterRepository;
use Rozklad\CQRSBundle\Domain\Model\Semester;

/**
 * Class SemesterCommandHandler
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Command\Handler
 */
class SemesterCommandHandler extends CommandHandler
{
    /**
     * @var SemesterRepository
     */
    private $repository;

    /**
     * @param SemesterRepository $repository
     */
    public function __construct(SemesterRepository $repository)
    {
        $this->$repository = $repository;
    }

    public function handleCreateSemester(Semester\Command\CreateSemester$command)
    {
        $semester = Semester::create($command->getId(), $command->getFromDate(), $command->getToDate());
        $this->repository->save($semester);
    }
}
