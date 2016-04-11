<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Command\CreateTeacher;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Teacher;
use Rozklad\CQRSBundle\Domain\Model\Teacher\TeacherRepository;

/**
 * Class TeacherCommandHandler
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Command\Handler
 */
class TeacherCommandHandler extends CommandHandler
{
    /**
     * @var TeacherRepository
     */
    private $repository;

    /**
     * @param TeacherRepository $repository
     */
    public function __construct(TeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateTeacher $command
     */
    public function handleCreateTeacher(CreateTeacher $command)
    {
        $teacher = Teacher::create($command->id, $command->name, $command->chairId, $command->outOfService);
        $this->repository->save($teacher);
    }
}