<?php

namespace app\services\UserService;

use Yii;
use app\models\User;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UnprocessableEntityHttpException;

class UserService
{
    public function view($id)
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

    public function create($id)
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

    public function update($id)
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

    public function delete($id)
    {
        $model = $this->findModel($id);

        $model->status = 0;

        if (!$model->save(false)) {
            return [
                'success' => false,
                'message' => 'Car deleted failed',
            ];
        }

        return [
            'success' => true,
            'message' => 'Car delete successfully',
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
