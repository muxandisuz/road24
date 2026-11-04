<?php

namespace app\controllers;

use Yii;
use app\models\Car;
use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\UnprocessableEntityHttpException;
use yii\filters\auth\HttpBearerAuth;

class CarController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
        ];

        return $behaviors;
    }

    // GET /cars
    public function actionIndex()
    {
        $query = Car::find()
                    ->where(['user_id' => Yii::$app->user->id]);


        $request = Yii::$app->request;

        $provider = new ActiveDataProvider([
            'query' => $query->orderBy(['id' => SORT_ASC]),
            'pagination' => [
                'pageSize' => $request->get('per-page', 10),
                'pageSizeLimit' => [1, 100],
            ],
        ]);

        return [
            'success' => true,
            'data' => $provider,
        ];
    }

    // GET /cars/1
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return [
            'success' => true,
            'data' => $model,
        ];
    }

    // POST /cars
    public function actionCreate()
    {
        $model = new Car();

        $data = Yii::$app->request->bodyParams;

        $model->user_id = Yii::$app->user->id;

        unset($data['user_id']);

        $model->load($data, '');

        if (!$model->validate()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $model->errors,
            ];
        }

        if (!$model->save(false)) {
            throw new UnprocessableEntityHttpException('Car creation failed');
        }

        Yii::$app->response->statusCode = 201;

        return [
            'success' => true,
            'message' => 'Car created successfully',
            'data' => $model,
        ];
    }

    // PUT/PATCH /cars/1
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $data = Yii::$app->request->bodyParams;

        unset($data['user_id']);

        $model->load($data, '');

        if (!$model->validate()) {
            return [
                'success' => false,
                'errors' => $model->errors,
            ];
        }

        if (!$model->save(false)) {
            throw new UnprocessableEntityHttpException('Car update failed');
        }

        return [
            'success' => true,
            'message' => 'Car updated successfully',
            'data' => $model,
        ];
    }

    // DELETE /cars/1
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model === null) {
            throw new NotFoundHttpException('Car not found');
        } else{
            $model->delete();
        }

        return [
            'success' => true,
            'message' => 'Car deleted successfully',
        ];
    }

    protected function findModel($id)
    {
        $model = Car::findOne([
            'id' => $id,
            'user_id' => Yii::$app->user->id,
        ]);

        if (!$model) {
            throw new NotFoundHttpException('Car not found');
        }

        return $model;
    }
}
