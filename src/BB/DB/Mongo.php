<?php

namespace BB\DB;

/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 24.07.15
 * Time: 20:31
 */
class Mongo {
    /**
     * @var \MongoDB
     */
    public static $db;

    /**
     * @param string $dbname
     */
    public static function connect($dbname) {
        $mc = new \MongoClient();
        self::$db = $mc->$dbname;
    }
}