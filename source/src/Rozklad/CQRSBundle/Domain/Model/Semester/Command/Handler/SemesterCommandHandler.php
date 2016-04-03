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
    private $semesterRepository;

    /**
     * @param SemesterRepository $repository
     */
    public function __construct(SemesterRepository $repository)
    {
        $this->semesterRepository = $repository;
    }

    public function handleCreateSemester(Semester\Command\CreateSemester$command)
    {
        $semester = Semester::create($command->id, $command->from, $command->to);
        $this->semesterRepository->save($semester);
    }
}
