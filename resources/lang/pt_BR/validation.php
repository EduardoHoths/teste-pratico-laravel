<?php

return [
    'required' => 'O campo :attribute é obrigatório.',
    'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'min' => [
        'string' => 'O campo :attribute deve ter no mínimo :min caracteres.',
    ],
    'max' => [
        'string' => 'O campo :attribute não pode ter mais que :max caracteres.',
    ],
    'confirmed' => 'A confirmação de :attribute não confere.',
    'unique' => 'O :attribute já está em uso.',
    'image' => 'O campo :attribute deve ser uma imagem.',
    'mimes' => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'string' => 'O campo :attribute deve ser uma string.',

    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
        'avatar' => 'avatar',
    ],
];

