<?php

namespace models;

class Usuario extends DataBase
{
    public $nome;
    public $email;
    public $senha;

    public function findUserByEmail()
    {
        var_dump($this);
        die();

        $query = $this->link->query("SELECT * FROM usuario WHERE email = '$this->email'");

        if ($query->num_rows) {
            while ($row = $query->fetch_assoc()) {
                return $row;
            }
        }

        return false;
    }
}