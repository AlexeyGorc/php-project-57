<?php

return [
    'index' => [
        'header' => 'Метки',
        'id' => 'ID',
        'name' => 'Имя',
        'description' => 'Описание',
        'created_at' => 'Дата создания',
        'actions' => 'Действия',
        'delete_confirmation' => 'Вы уверены?',
        'delete' => 'Удалить',
        'edit' => 'Изменить',
        'create_button' => 'Создать метку'
    ],
    'edit' => [
        'form_header' => 'Изменение метки',
        'labels' => [
            'name' => 'Имя',
            'description' => 'Описание'
        ],
        'buttons' => [
            'update' => 'Обновить'
        ]
    ],
    'create' => [
        'form_header' => 'Создать метку',
        'labels' => [
            'name' => 'Имя',
            'description' => 'Описание'
        ],
        'buttons' => [
            'update' => 'Обновить'
        ]
    ],
    'validation' => [
        'unique' => 'Метка с таким именем уже существует',
        'required' => 'Это обязательно поле'
    ]
];
