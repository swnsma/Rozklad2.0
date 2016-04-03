<?php

namespace Rozklad\CQRSBundle\Domain\Model\Chair\Command\Handler;

use Broadway\CommandHandling\CommandHandler;
use Rozklad\CQRSBundle\Domain\Model\Chair;
use Rozklad\CQRSBundle\Domain\Model\ChairRepository;
use Rozklad\CQRSBundle\Domain\Model\Chair\Command\CreateChair;

/**
 * Class ChairCommandHandler
 * @package Rozklad\CQRSBundle\Domain\Model\Chair\Command\Handler
 */
class ChairCommandHandler extends CommandHandler
{
    /**
     * @var ChairRepository
     */
    private $semesterRepository;

    /**
     * @param ChairRepository $repository
     */
    public function __construct(ChairRepository $repository)
    {
        $this->semesterRepository = $repository;
    }

    public function handleCreateSemester(CreateChair $command)
    {
        $semester = Chair::create($command->id, $command->title);
        $this->semesterRepository->save($semester);
    }
}
