<?php
class TestModel
{
    CONST DSN = 'mysql:host=localhost;dbname=test';
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

    public function getLessons()
    {
        $query = "SELECT * FROM `schedule_flat`";
        $sth = $this->connection->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetchAll();
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