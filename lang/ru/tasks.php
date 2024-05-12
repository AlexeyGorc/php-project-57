<?php

return [
    'index' => [
        'header' => 'Задачи',
        'id' => 'ID',
        'name' => 'Имя',
        'created_at' => 'Дата создания',
        'actions' => 'Действия',
        'delete_confirmation' => 'Вы уверены?',
        'delete' => 'Удалить',
        'edit' => 'Изменить',
        'create_button' => 'Создать задачу',
        'status' => 'Статус',
        'creator' => 'Автор',
        'assigned_to' => 'Исполнитель',
        'placeholders' => [
            'status_id' => 'Статус',
            'created_by_id' => 'Автор',
            'assigned_to_id' => 'Исполнитель'
        ],
        'filter_button' => 'Применить'
    ],
    'edit' => [
        'form_header' => 'Изменение задачи',
        'labels' => [
            'name' => 'Имя',
            'description' => 'Описание',
            'status_id' => 'Статус',
            'assigned_to_id' => 'Исполнитель',
            'labels' => 'Метки'
        ],
        'buttons' => [
            'update' => 'Обновить'
        ]
    ],
    'create' => [
        'form_header' => 'Создать задачу',
        'labels' => [
            'name' => 'Имя',
            'description' => 'Описание',
            'status_id' => 'Статус',
            'assigned_to_id' => 'Исполнитель',
            'labels' => 'Метки'
        ],
        'buttons' => [
            'create' => 'Создать'
        ]
    ],
    'show' => [
        'header' => 'Просмотр задачи: :name',
        'name' => 'Имя',
        'description' => 'Описание',
        'status_id' => 'Статус',
        'labels' => 'Метки'
    ],
    'validation' => [
        'unique' => 'Задача с таким именем уже существует',
        'required' => 'Это обязательно поле'
    ]
];
