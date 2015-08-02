<?php

namespace BB\Models;

use BB\DB\Mongo;

/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 24.07.15
 * Time: 20:02
 */

/**
 * Class Users
 * @package BB\Models\
 */
class Users extends Model {
    public static $schema = [
        'uid' => [
            'default' => 'Unknow',
            'value_type' => 'integer',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'ID Пользователя'
        ],
        'first_name' => [
            'default' => 'Unknow',
            'value_type' => 'string',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Имя'
        ],
        'last_name' => [
            'default' => 'Unknow',
            'value_type' => 'string',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Фамилия'
        ],
        'sex' => [
            'default' => 'Unknow',
            'value_type' => 'integer',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Пол'
        ],
        'last_seen' => [
            'default' => null,
            'value_type' => 'array',
            'control_type' => null,
            'scenario' => ['edit'],
            'label' => 'Последний визит'
        ],
        'has_mobile' => [
            'default' => 'Unknow',
            'value_type' => 'integer',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Есть мобильный?'
        ],
        'online' => [
            'default' => 'Unknow',
            'value_type' => 'integer',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Онлайн?'
        ],
        'photo_max' => [
            'default' => null,
            'value_type' => 'string',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Фотография профиля'
        ],
        'photo_max_orig' => [
            'default' => null,
            'value_type' => 'string',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Большая фотография профиля'
        ]
    ];

    public function getPool() {
        $result = $this->query([],['uid'=> 1],[],0,300);
        return array_values(array_map(function($item){
            return $item['uid'];
        }, $result[0]));
    }
}
