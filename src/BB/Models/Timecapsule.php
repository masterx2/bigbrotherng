<?php
/**
 * Created by PhpStorm.
 * User: masterx2
 * Date: 27.07.15
 * Time: 0:42
 */

namespace BB\Models;


class Timecapsule extends Model {
    public static $schema = [
        'uid' => [
            'default' => 'Unknow',
            'value_type' => 'integer',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'ID Пользователя'
        ],
        'start' => [
            'default' => null,
            'value_type' => 'date',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Начало отметки'
        ],
        'end' => [
            'default' => null,
            'value_type' => 'date',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Конец отметки'
        ],
        'status' => [
            'default' => null,
            'value_type' => 'integer',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Статус'
        ],
        'duration' => [
            'default' => 0,
            'value_type' => 'integer',
            'control_type' => 'input',
            'scenario' => ['edit'],
            'label' => 'Промежуток'
        ]
    ];
}