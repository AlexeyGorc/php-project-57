<?php

return [
    'index' => [
        'header' => 'Статусы',
        'id' => 'ID',
        'name' => 'Имя',
        'created_at' => 'Дата создания',
        'actions' => 'Действия',
        'delete_confirmation' => 'Вы уверены?',
        'delete' => 'Удалить',
        'edit' => 'Изменить',
        'create_button' => 'Создать статус'
    ],
    'edit' => [
        'form_header' => 'Изменение статуса',
        'labels' => [
            'name' => 'Имя'
        ],
        'buttons' => [
            'update' => 'Обновить'
        ]
    ],
    'create' => [
        'form_header' => 'Создать статус',
        'labels' => [
            'name' => 'Имя'
        ],
        'buttons' => [
            'create' => 'Создать'
        ]
    ],
    'validation' => [
        'unique' => 'Статус с таким именем уже существует',
        'required' => 'Это обязательно поле'
    ]
];
