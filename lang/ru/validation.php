<?php

return [
    'required' => 'Это обязательное поле',
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
