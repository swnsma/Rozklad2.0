<?php

namespace Rozklad\CQRSBundle\Domain\Model\Teacher\Event;

/**
 * Class TeacherCreated
 * @package Rozklad\CQRSBundle\Domain\Model\Teacher\Event
 */
class TeacherCreated extends TeacherEvent
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $chairId;

    /**
     * @var boolean
     */
    private $outOfService;

    /**
     * CreateTeacherEvent constructor.
     *
     * @param $id
     * @param $name
     * @param $chairId
     * @param $oos
     */
    public function __construct($id, $name, $chairId, $oos)
    {
        $this->name = $name;
        $this->chairId = $chairId;
        $this->outOfService = $oos;
        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getChairId()
    {
        return $this->chairId;
    }

    /**
     * @return bool
     */
    public function getOutOfService()
    {
        return $this->outOfService;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return array_merge(parent::serialize(), array(
            'chairId' => $this->chairId,
            'oos' => $this->outOfService,
            'name' => $this->name
        ));
    }

    /**
     * {@inheritdoc}
     */
    public static function deserialize(array $data)
    {
        return new static(
            $data['id'],
            $data['name'],
            $data['chairId'],
            $data['oos']
        );
    }
}
