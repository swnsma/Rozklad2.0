<?php
class TestModel
{
    CONST DSN = 'mysql:host=localhost;dbname=test;charset=UTF8';
    CONST USER = 'root';
    CONST PASSWORD = 'root';
    private $connection = null;
    public function __construct()
    {
        try{
        $this->connection = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch(Exception $e) {
            die('Can\'t include to database server');
        }
    }


    protected function loadLessons()
    {
        $query = "SELECT * FROM `schedule_flat`";
        $sth = $this->connection->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetchAll();
    }
    public function getLessons()
    {
        $data = $this->loadLessons();
        foreach ($data as $record) {
            $data['type'] = $data['type'] == 1? 'Практика': 'Лекція';
            $data['from'] = $this->getFrom($data['schedule']);
            $data['to'] = $this->getTo($data['schedule']);
        }
        return $data;
    }

    protected function getTo($lesson)
    {
        switch($lesson)
        {
            case 1:
                return "9:20";
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
        switch($lesson)
        {
            case 1:
                return "8:00";
            case 2:
                return "9:30";
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
        return "8:00";
    }

}
class TestController
{
    public function run()
    {
        $model = new TestModel();
        echo json_encode($model->getLessons());
    }
}

$go = new TestController();
$go->run();