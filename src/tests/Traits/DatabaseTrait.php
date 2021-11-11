<?php

trait DatabaseTrait
{

    protected static $db_connection = false;

    /**
     * @beforeClass
    */
    public static function createDatabase(): void
    {
        if(self::$db_connection)
            return;

        self::$db_connection = new \PDO('sqlite::database.db');
    }

    /**
     * @afterClass
    */
    public static function deleteDatabase(): void
    {
        self::$db_connection = null;
        unlink(':database.db');
    }
}