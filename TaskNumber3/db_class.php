<?php

class Database
{
    private static $instance = null;
    private $connection = null;
    protected function __construct()
    {
        $this->connection = new \PDO('mysql:host=127.0.0.1;dbname=forum;charset=utf8', 'root', null,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //выбрасывать исключение при ошибке
                PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC, //использовать имена столбцов
                PDO::ATTR_EMULATE_PREPARES => false //Подготовка запроса на уровне БД
            ]);
    }

    //Экземляр класса, хранящий подключение к БД
    public static function getInstance(): Database
    {
        if(null == self::$instance){
            self::$instance = new static();
        }
        return self::$instance;
    }

    //Экземляр подключения к БД
    public static function connection(): \PDO
    {
        return static::getInstance()->connection;
    }
}
?>