<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Command\BecomeOutOfService;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Command\ChangeChair;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Command\ChangeName;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Command\CreateTeacher;
use Rozklad\CQRSBundle\Domain\Model\Teacher\Command\ReturnToService;
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
        $teacher = Teacher::create(
            $command->getId(),
            $command->getName(),
            $command->getChairId(),
            $command->getOutOfService()
        );

        $this->repository->save($teacher);
    }

    /**
     * @param ChangeChair $command
     */
    public function handleChangeChair(ChangeChair $command)
    {
        /** @var \Rozklad\CQRSBundle\Domain\Model\Teacher\Teacher $teacher */
        $teacher = $this->repository->load($command->getId());
        $teacher->changeChair($command->getChairId());
        $this->repository->save($teacher);
    }

    /**
     * @param BecomeOutOfService $command
     */
    public function handleBecomeOutOfService(BecomeOutOfService $command)
    {
        /** @var \Rozklad\CQRSBundle\Domain\Model\Teacher\Teacher $teacher */
        $teacher = $this->repository->load($command->getId());
        $teacher->becomeOutOfService();
        $this->repository->save($teacher);
    }

    /**
     * @param ChangeName $command
     */
    public function handleChangeName(ChangeName $command)
    {
        /** @var \Rozklad\CQRSBundle\Domain\Model\Teacher\Teacher $teacher */
        $teacher = $this->repository->load($command->getId());
        $teacher->changeName($command->getName());
        $this->repository->save($teacher);
    }

    /**
     * @param ReturnToService $command
     */
    public function handleReturnToService(ReturnToService $command)
    {
        /** @var \Rozklad\CQRSBundle\Domain\Model\Teacher\Teacher $teacher */
        $teacher = $this->repository->load($command->getId());
        $teacher->returnToService();
        $this->repository->save($teacher);
    }

}