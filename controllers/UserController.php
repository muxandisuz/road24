<?php

namespace app\controllers;

use app\services\UserService\UserService;
use BaseController;

class UserController extends BaseController
{

    private $userService;

    public function __construct($id, $module, UserService  $userService, $config = [])
    {
        $this->userService = $userService;
        parent::__construct($id, $module, $config);
    }

    // GET /users/1
    public function actionView($id)
    {
        return $this->userService->view($id);
    }

    // POST /users
    public function actionCreate()
    {
        return $this->userService->create();
    }

    // PUT/PATCH /users/1
    public function actionUpdate($id)
    {
        return $this->userService->update($id);
    }

    // DELETE /users/1
    public function actionDelete($id)
    {
        return $this->userService->delete($id);
    }
}
