<?php
class GroupModel
{
    CONST DSN = 'mysql:host=localhost;dbname=mvp_rozklad;charset=UTF8';
    CONST USER = 'root';
    CONST PASSWORD = 'abcABC123';
    private $connection = null;
    public function __construct()
    {
        try{
            $this->connection = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch(Exception $e) {
            die('Can\'t include to database server');
        }
    }

    public function getGroups()
    {
        $query = "SELECT `schedule_flat`.`group` FROM `schedule_flat` GROUP by `schedule_flat`.`group`";
        $sth = $this->connection->prepare($query);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        return $sth->fetchAll();
    }
}
class GroupController
{
    public function run()
    {
        $model = new GroupModel();
        echo json_encode($model->getGroups());
    }
}

$go = new GroupController();
$go->run();