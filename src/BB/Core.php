<?php
/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 24.07.15
 * Time: 20:28
 */

namespace BB;

use BB\DB\Mongo;
use BB\Models\Users;
use Noodlehaus\Config;


define('CONFIG_PATH', __DIR__.'/../../config/');

/**
 * Class Core
 * @package BB
 */
class Core {

    /**
     * @var \Redis
     */
    public static $redis;

    public static function init() {
        $config = new Config([CONFIG_PATH.'common.json', '?'.CONFIG_PATH.'local.json']);
        Vk::init($config['vk.app_id'],$config['vk.app_secret']);
        Mongo::connect($config['mongo']);
        self::$redis = new \Redis();
        self::$redis->connect($config['redis.host'], $config['redis.port']);
    }

    public static function upsertUsers($users) {
        $storage = new Users();
        foreach ($users as $user) {
            $exist_user = $storage->findOne(['uid' => $user['uid']]);
            if ($exist_user) {
                $storage->updateByMongoId($exist_user['_id'], $user);
            } else {
                $storage->add($user);
            }
        }
    }

    public static function updateUsers($user_ids) {
        $storage = new Users();
        $result = Vk::getUsers($user_ids, $storage->getFields());
        self::upsertUsers($result);
    }

    public static function updateFriends($user_id) {
        $storage = new Users();
        $result = Vk::getFriends($user_id, $storage->getFields());
        self::upsertUsers($result);
    }
}