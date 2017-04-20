<?php

namespace models;

class Usuario extends DataBase
{
    public $nome;
    public $email;
    public $senha;

    public function findUserByEmail($email)
    {
        $query = $this->link->query("SELECT * FROM usuario WHERE email = '$email'");

        if ($query->num_rows) {
            while ($row = $query->fetch_assoc()) {
                return $row;
            }
        }

        return false;
    }
}