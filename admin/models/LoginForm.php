<?php

namespace models;

use models\Usuario;

class LoginForm
{
    public $email;
    public $password;
    private $_user;

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
            if ($attr == '_user')
                continue;

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
        $user = new Usuario();
        $this->_user = $user->findUserByEmail($this->email);

        if (!empty($this->_user)) {
            unset($this->_user['senha']);
            $_SESSION['userLogged'] = $this->_user;
            return true;
        } else {
            return false;
        }
    }
}