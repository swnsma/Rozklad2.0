<?php

namespace Rozklad\CQRSBundle\Domain\Model\Semester\Event;

/**
 * Class SemesterCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Semester\Event
 */
class SemesterCreated extends SemesterEvent
{
    /**
     * @var \DateTime
     */
    private $from;

    /**
     * @var \DateTime
     */
    private $to;

    /**
     * CreateSemesterEvent constructor.
     *
     * @param $id
     * @param $from
     * @param $to
     */
    public function __construct($id, $from, $to)
    {
        $this->from = $from;
        $this->to = $to;
        parent::__construct($id);
    }

    /**
     * @return \DateTime
     */
    public function getFromDate()
    {
        return $this->from;
    }

    /**
     * @return \DateTime
     */
    public function getToDate()
    {
        return $this->to;
    }

    /**
     * @return mixed The object instance
     */
    public static function deserialize(array $data)
    {
        return new static($data['id'], $data['from'], $data['to']);
    }
}