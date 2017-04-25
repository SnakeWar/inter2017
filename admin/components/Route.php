<?php

namespace components;

class Route
{
    public function checkRoute()
    {
        $get = $_GET;

        if (isset($get['r'])) {
            list($controller, $action) = explode('/', $get['r']);
        }
    }
}