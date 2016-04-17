<?php

namespace Rozklad\CQRSBundle\Domain\Model\Group\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\Group\Command\ChangeGroupEndDate;
use Rozklad\CQRSBundle\Domain\Model\Group\Command\ChangeGroupStartDate;
use Rozklad\CQRSBundle\Domain\Model\Group\Command\ChangeGroupTitle;
use Rozklad\CQRSBundle\Domain\Model\Group\Command\CreateGroup;
use Rozklad\CQRSBundle\Domain\Model\Group\Command\RemoveGroupFromStudy;
use Rozklad\CQRSBundle\Domain\Model\Group\Command\ReturnGroupToStudy;
use Rozklad\CQRSBundle\Domain\Model\Group\Group;
use Rozklad\CQRSBundle\Domain\Model\Group\GroupRepository;

/**
 * Class GroupCommandHandler
 * @package Rozklad\CQRSBundle\Domain\Model\Group\Command\Handler
 */
class GroupCommandHandler extends CommandHandler
{
    /**
     * @var GroupRepository
     */
    private $repository;

    /**
     * @param GroupRepository $repository
     */
    public function __construct(GroupRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateGroup $command
     */
    public function handleCreateGroup(CreateGroup $command)
    {
        $group = Group::create(
            $command->getId(),
            $command->getTitle(),
            $command->getStartDate(),
            $command->getEndDate(),
            $command->isNotStudy()
        );
        $this->repository->save($group);
    }

    /**
     * @param ChangeGroupEndDate $command
     */
    public function handleChangeGroupEndDate(ChangeGroupEndDate $command)
    {
        /** @var Group $group */
        $group = $this->repository->load($command->getId());
        $group->changeEndDate($command->getEndDate());
        $this->repository->save($group);
    }

    /**
     * @param ChangeGroupStartDate $command
     */
    public function handleChangeGroupStartDate(ChangeGroupStartDate $command)
    {
        /** @var Group $group */
        $group = $this->repository->load($command->getId());
        $group->changeStartDate($command->getStartDate());
        $this->repository->save($group);
    }

    /**
     * @param ChangeGroupTitle $command
     */
    public function handleChangeGroupTitle(ChangeGroupTitle $command)
    {
        /** @var Group $group */
        $group = $this->repository->load($command->getId());
        $group->changeTitle($command->getTitle());
        $this->repository->save($group);
    }

    /**
     * @param RemoveGroupFromStudy $command
     */
    public function handleRemoveGroupFromStudy(RemoveGroupFromStudy $command)
    {
        /** @var Group $group */
        $group = $this->repository->load($command->getId());
        $group->removeFromStudy();
        $this->repository->save($group);
    }

    /**
     * @param ReturnGroupToStudy $command
     */
    public function handleReturnGroupToStudy(ReturnGroupToStudy $command)
    {
        /** @var Group $group */
        $group = $this->repository->load($command->getId());
        $group->returnToStudy();
        $this->repository->save($group);
    }
}
