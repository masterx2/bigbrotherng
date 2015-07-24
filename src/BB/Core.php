<?php
/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 24.07.15
 * Time: 20:28
 */

namespace BB;

use BB\Controllers\Vk;
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

    public static function updateUsers($user_ids) {
        $users = new Users();
        $result = Vk::getUsers($user_ids, implode(',', array_keys(Users::$schema)));

        foreach ($result as $user) {
            $users->addNext($user);
        }
    }
}