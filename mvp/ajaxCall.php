<?php

class TestModel
{
    CONST DSN = 'mysql:host=localhost;dbname=test;charset=UTF8';
    CONST USER = 'root';
    CONST PASSWORD = 'root';
    private $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (Exception $e) {
            die('Can\'t include to database server');
        }
    }


    protected function loadLessons()
    {
        $query = "SELECT * FROM `schedule_flat` WHERE `schedule_flat`.`group`='мо-59'";
        $sth = $this->connection->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getLessons()
    {
        $data = $this->loadLessons();
        foreach ($data as &$record) {
//            $record['type'] = $record['type'] == 1 ? 'Практика' : 'Лекція';
            $record['from'] = $this->getFrom($record['schedule']);
            $record['to'] = $this->getTo($record['schedule']);
        }
        return $data;
    }

    public function getLessonsForAllDay()
    {
        $data = $this->getLessons();
        $result = array();
        foreach ($data as $item) {
            $firstDay = new DateTime($this->_getFirstDay());
            $dayPluse = intval(($item['week']-1)*7) + intval($item['dow']) - 1;
            $firstDay = $firstDay->modify("+$dayPluse day");
            while ($firstDay < new DateTime($this->_getLastDay())) {
                $item['full_from'] = $firstDay->format('Y-m-d') . ' ' . $item['from'];
                $item['full_to'] = $firstDay->format('Y-m-d') . ' ' . $item['to'];
                $firstDay = $firstDay->modify("+14 day");
                $result[] = $item;
            }
        }
        return $result;
    }

    public function getLessonsInFormat()
    {
        $lessons = $this->getLessonsForAllDay();
        $result = array();
        foreach ($lessons as $lesson) {
            $item = [];
            $item['title'] = $lesson['subject'];
            $item['start'] = $lesson['full_from'];
            $item['end'] = $lesson['full_to'];
            $item['teacher'] = $lesson['teacher'];
            $item['auditory'] = $lesson['auditory'];
            $item['type'] = $lesson['type'];
            $result[] = $item;
        }
        return $result;
    }

    protected function _getFirstDay()
    {
        return '2016-02-15';
    }

    protected function _getLastDay()
    {
        return '2016-06-15';
    }

    protected function getTo($lesson)
    {
        switch ($lesson) {
            case 1:
                return "09:20";
            case 2:
                return "10:50";
            case 3:
                return "12:30";
            case 4:
                return "14:00";
            case 5:
                return "15:30";
            case 6:
                return "17:00";
            case 7:
                return "18:40";
            case 8:
                return "20:10";
        }
        return "9:20";
    }

    protected function getFrom($lesson)
    {
        switch ($lesson) {
            case 1:
                return "08:00";
            case 2:
                return "09:30";
            case 3:
                return "11:10";
            case 4:
                return "12:40";
            case 5:
                return "14:10";
            case 6:
                return "15:40";
            case 7:
                return "17:20";
            case 8:
                return "18:50";
        }
        return "08:00";
    }

}

class TestController
{
    public function run()
    {
        $model = new TestModel();
        echo json_encode($model->getLessonsInFormat());
    }
}

$go = new TestController();
$go->run();