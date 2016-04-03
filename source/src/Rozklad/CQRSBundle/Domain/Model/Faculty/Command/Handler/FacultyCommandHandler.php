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
    private $semesterRepository;

    /**
     * @param FacultyRepository $repository
     */
    public function __construct(FacultyRepository $repository)
    {
        $this->semesterRepository = $repository;
    }

    public function handleCreateSemester(CreateFaculty $command)
    {
        $semester = Faculty::create($command->id, $command->title);
        $this->semesterRepository->save($semester);
    }
}
