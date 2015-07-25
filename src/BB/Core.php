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


/**
 * Class Core
 * @package BB
 *
 * @property Users $users
 */
class Core {

    public static function init($config=[]) {
        Vk::init('4110122','Tn6YLpDYE1ZDDTQuEcRA');
        Mongo::connect('bigbrother');
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
        $result = Vk::getUsers($user_ids, implode(',', array_keys(Users::$schema)));
        self::upsertUsers($result);
    }

    public static function updateFriends($user_id) {
        $result = Vk::getFriends($user_id, implode(',', array_keys(Users::$schema)));
        self::upsertUsers($result);
    }
}