<?php

namespace BB;
/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 23.07.15
 * Time: 15:03
 */

/**
 * Class Vk
 * @package BB\Controllers
 */
class Vk {
    /**
     * @var \VK\VK
     */
    public static $vk;

    /**
     * @param $app_id string
     * @param $app_secret string
     */
    public static function init($app_id, $app_secret) {
        self::$vk = new \VK\VK($app_id, $app_secret);
    }

    /**
     * @param $user_id string
     * @param $fields string
     * @return mixed array
     */
    public static function getFriends($user_id, $fields) {
        if (is_array($fields)) $fields = implode(',', $fields);
        return self::$vk->api('friends.get', [
            'user_id' => $user_id,
            'fields' => $fields
        ])['response'];
    }

    /**
     * @param $user_id string
     * @param $fields string
     * @return mixed array
     */
    public static function getUsers($user_ids, $fields) {
        if (is_array($user_ids)) $user_ids = implode(',', $user_ids);
        if (is_array($fields)) $fields = implode(',', $fields);
        return self::$vk->api('users.get', [
            'user_ids' => $user_ids,
            'fields' => $fields
        ])['response'];
    }
}