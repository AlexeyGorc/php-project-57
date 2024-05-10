<?php

return [
    'required' => 'Это обязательно поле',
    'custom' => [
        'password' => [
            'min' => [
                'string' => 'Пароль должен иметь длину не менее :min символов'
            ],
            'confirmed' => 'Пароль и подтверждение не совпадают'
        ]
    ],
    'attributes' => []
];
