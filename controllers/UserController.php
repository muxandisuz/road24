<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\UnprocessableEntityHttpException;
use yii\filters\auth\HttpBearerAuth;

class UserController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];



        return $behaviors;
    }

    // GET /users
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
//        $user = User::findAll();

        return [
            'success' => true,
            'data' => $user,
        ];
    }

    // GET /users/1
    public function actionView($id)
    {
        $user = $this->findModel($id);

        if ($user->id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Access denied');
        }

        return [
            'success' => true,
            'data' => $user,
        ];
    }

    // POST /users
    public function actionCreate()
    {
        $model = new User();

        $data = Yii::$app->request->bodyParams;

        $model->scenario = 'register';
        $model->load($data, '');

        if (!$model->validate()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $model->errors,
            ];
        }

        if (!$model->save(false)) {
            throw new UnprocessableEntityHttpException('User creation failed');
        }

        Yii::$app->response->statusCode = 201;

        return [
            'success' => true,
            'message' => 'User created successfully',
            'data' => $model,
        ];
    }

    // PUT/PATCH /users/1
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Access denied');
        }

        $data = Yii::$app->request->bodyParams;

        $model->scenario = 'default';
        $model->load($data, '');

        if (!empty($data['password'])) {
            $model->password = $data['password'];
        }

        if (!$model->validate()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $model->errors,
            ];
        }

        if (!$model->save(false)) {
            throw new UnprocessableEntityHttpException('User update failed');
        }

        return [
            'success' => true,
            'message' => 'User updated successfully',
            'data' => $model,
        ];
    }

    // DELETE /users/1
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Access denied');
        }

        if ($model === null) {
            throw new NotFoundHttpException('User not found');
        } else{
            $model->delete();
        }

        return [
            'success' => true,
            'message' => 'User deleted successfully',
        ];
    }

    protected function findModel($id)
    {
        $model = User::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException('User not found');
        }

        return $model;
    }
}
