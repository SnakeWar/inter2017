<?php

namespace controllers;

use models\LoginForm;

class SiteController
{
    public static function login()
    {
        $model = new LoginForm();

        if ($model->load($_POST) && $model->login()) {
            header("Refresh:0");
        }

        return [
            'model' => $model
        ];
    }
}