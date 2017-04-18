<?php

namespace controllers;

use models\LoginForm;

class SiteController
{
    public static function login()
    {
        $model = new LoginForm();

        return [
            'model' => $model
        ];
    }
}