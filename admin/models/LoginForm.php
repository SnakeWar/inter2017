<?php

namespace models;

class LoginForm
{
    public $email;
    public $password;

    public function getLabel($attr)
    {
        $labels = [
            'email' => 'E-mail',
            'password' => 'Senha'
        ];

        return $labels[$attr];
    }
}