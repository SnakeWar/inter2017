<?php

namespace models;

use models\Usuario;

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

    public function load($post)
    {
        foreach (get_object_vars($this) as $attr => $value) {
            if (isset($post[$attr]) && !empty($post[$attr])) {
                $this->$attr = $post[$attr];
            } else {
                return false;
            }
        }

        return true;
    }

    public function login()
    {
        $user = new Usuario($this);
        $user->findUserByEmail();

        if (!empty($this->_user)) {
            unset($this->_user['senha']);
            $_SESSION['userLogged'] = $this->_user;
            return true;
        } else {
            return false;
        }
    }
}