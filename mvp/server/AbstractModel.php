<?php
/**
 * Created by tania.
 * Date: 25.04.16
 * Time: 20:43
 * @corporation Maksi
 */

abstract class AbstractModel{

    CONST DSN = 'mysql:host=localhost;dbname=test;charset=UTF8';
    CONST USER = 'root';
    CONST PASSWORD = 'root';
    protected $connection = null;

    public function __construct()
    {
        try {
            $this->connection = new PDO(self::DSN, self::USER, self::PASSWORD);
        } catch (Exception $e) {
            die('Can\'t include to database server');
        }
    }


}