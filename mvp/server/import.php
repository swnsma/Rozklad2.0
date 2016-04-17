<?php
$fileName = $argv[1];
if($fileName == '-h') {
    die("file_name dsn user password [drop?]
    Example: import.csv \"mysql:host=127.0.0.1:3308;dbname=axpdb;charset=UTF8\" admin 1234 true");
}
$dsn = $argv[2];
$user = $argv[3];
$password = $argv[4];
$drop = isset($argv[5]) ? $argv[5] : '';

if (!is_file($fileName)) {
   die('Import file doesn\'t found');
}

try {
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;
SQL;
$pdo->exec($query);
$query = <<<SQL
INSERT INTO `schedule_flat`(`group`, `subject`, `teacher`, `type`, `schedule`, `auditory`, `week`, `dow`) VALUES(?, ?, ?, ?, ?, ?, ?, ?);
SQL;

$handler = fopen($fileName, "r");
$sth = $pdo->prepare($query);
while(($data = fgetcsv($handler)) !== false) {
    $sth->execute($data);
}
$handler = null;
$pdo = null;
echo ("Done" . PHP_EOL);