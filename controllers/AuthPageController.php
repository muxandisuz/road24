<?php

namespace app\controllers;

use yii\web\Controller;

class AuthPageController extends Controller
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        return $this->render('register');
    }
}
