<?php

namespace models;

use components\Config;
use mysqli;

class DataBase extends Config
{
    public $link;

    public function __construct()
    {
        $this->link = new mysqli($this->db['host'], $this->db['user'], $this->db['password'], $this->db['database']);

        if ($this->link->connect_errno > 0) {
            die('Unable to connect to database [' . $this->link->connect_error . ']');
        }
    }
}