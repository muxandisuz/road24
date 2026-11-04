<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use app\models\User;
use app\components\JwtAuth;
use app\services\AuthService\Authservice;

class AuthController extends BaseController
{

    private AuthService  $authService;

    public function __construct($id, $module, Authservice  $authService, $config = [])
    {
        $this->authService = $authService;
        parent::__construct($id, $module, $config);
    }

    public function actionRegister()
    {
        return $this->authService->register();
    }

    public function actionLogin()
    {
        return $this->authService->login();
    }
}
