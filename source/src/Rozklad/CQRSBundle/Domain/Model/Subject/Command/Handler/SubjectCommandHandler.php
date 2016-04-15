<?php

namespace Rozklad\CQRSBundle\Domain\Model\Subject\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\Subject\Command\BecomeSubjectOutOfService;
use Rozklad\CQRSBundle\Domain\Model\Subject\Command\ChangeSubjectChair;
use Rozklad\CQRSBundle\Domain\Model\Subject\Command\ChangeSubjectTitle;
use Rozklad\CQRSBundle\Domain\Model\Subject\Command\CreateSubject;
use Rozklad\CQRSBundle\Domain\Model\Subject\Command\ReturnSubjectToService;
use Rozklad\CQRSBundle\Domain\Model\Subject\Subject;
use Rozklad\CQRSBundle\Domain\Model\Subject\SubjectRepository;

/**
 * Class SubjectCommandHandler
 * @package Rozklad\CQRSBundle\Domain\Model\Subject\Command\Handler
 */
class SubjectCommandHandler extends CommandHandler
{
    /**
     * @var SubjectRepository
     */
    private $repository;

    /**
     * SubjectCommandHandler constructor.
     *
     * @param SubjectRepository $repository
     */
    public function __construct(SubjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateSubject $command
     */
    public function handleCreateSubject(CreateSubject $command)
    {
        $subject = Subject::create(
            $command->getId(),
            $command->getTitle(),
            $command->getChairId(),
            $command->isOutOfService()
        );

        $this->repository->save($subject);
    }

    public function handleBecomeSubjectOutOfService(BecomeSubjectOutOfService $command)
    {
        /** @var Subject $subject */
        $subject = $this->repository->load($command->getId());
        $subject->becomeOutOfService();
        $this->repository->save($subject);
    }

    /**
     * @param ReturnSubjectToService $command
     */
    public function handleReturnSubjectToService(ReturnSubjectToService $command)
    {
        /** @var Subject $subject */
        $subject = $this->repository->load($command->getId());
        $subject->returnToService();
        $this->repository->save($subject);
    }

    /**
     * @param ChangeSubjectTitle $command
     */
    public function handleChangeSubjectTitle(ChangeSubjectTitle $command)
    {
        /** @var Subject $subject */
        $subject = $this->repository->load($command->getId());
        $subject->changeTitle($command->getTitle());
        $this->repository->save($subject);
    }

    /**
     * @param ChangeSubjectChair $command
     */
    public function handleChangeSubjectChair(ChangeSubjectChair $command)
    {
        /** @var Subject $subject */
        $subject = $this->repository->load($command->getId());
        $subject->changeChairId($command->getChair());
        $this->repository->save($subject);
    }

}