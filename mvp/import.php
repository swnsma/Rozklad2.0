<?php
$fileName = "import.csv";
if($fileName == '-h') {
    die("file_name dsn user password [drop?]
    Example: import.csv \"mysql:host=127.0.0.1:3308;dbname=axpdb\" admin 1234 true");
}
$dsn = "mysql:host=localhost;dbname=mvp";
$user = "root";
$password = "root";
$drop = isset($argv[5]) ? $argv[5] : '';

if (!is_file($fileName)) {
   die('Import file doesn\'t found');
}

try {
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
//    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
    $pdo->exec("set names utf8");
} catch (Exception $e) {
    die('Can\'t connect to database server.');
}

if ($drop == "true" || $drop == "Y" || $drop == "y") {
    $query = "DROP TABLE IF EXISTS `schedule_flat`;";
    $pdo->exec($query);
}
$query = <<<SQL
CREATE TABLE IF NOT EXISTS `schedule_flat`(
`id` INT AUTO_INCREMENT PRIMARY KEY,
`group` varchar(255),
`subject` varchar(255),
`teacher` varchar(255),
`type` int,
`schedule` int,
`auditory` varchar(10),
`week` int,
`dow` int
);
SQL;
$pdo->exec($query);
$query = <<<SQL
INSERT INTO `schedule_flat`(`group`, `subject`, `teacher`,`type`, `schedule`, `auditory`, `week`, `dow`) VALUES(?, ?,?, ?, ?, ?, ?, ?);
SQL;

$handler = fopen($fileName, "r");
$sth = $pdo->prepare($query);

while(($data = fgetcsv($handler)) !== false) {
    $sth->execute($data);
}
$handler = null;
$pdo = null;
echo ("Done" . PHP_EOL);