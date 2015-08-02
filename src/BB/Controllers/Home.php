<?php
/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 25.07.15
 * Time: 17:29
 */

namespace BB\Controllers;

class Home {
    public static function index() {
        $users = new \BB\Models\Users();
        $tc = new \BB\Models\Timecapsule();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($tc->query(['uid'=>398883],['_id' => 1],[],0,100)[0], JSON_UNESCAPED_UNICODE);
    }
}