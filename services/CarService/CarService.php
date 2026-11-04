<?php

namespace app\services\CarService;

use Yii;
use app\models\Car;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\UnprocessableEntityHttpException;

class  CarService
{
    public function getCars()
    {
        $query = Car::find()
            ->where([
                'user_id' => Yii::$app->user->id,
                'status' => 1
            ]);


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

    public function getCar($id)
    {
        $model = $this->findModel($id);

        return [
            'success' => true,
            'data' => $model,
        ];
    }

    public function createCar()
    {
        $model = new Car();

        $data = Yii::$app->request->bodyParams;

        if (!$model->load($data, '')) {
            throw new UnprocessableEntityHttpException(
                'Ma\'lumotlar yuborilmadi'
            );
        }

        $model->user_id = Yii::$app->user->id;
        $model->status = 1;

        if (!$model->validate()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $model->errors,
            ];
        }

        if (!$model->save(false)) {
            throw new UnprocessableEntityHttpException(
                'Avtomobilni saqlashda xatolik'
            );
        }

        Yii::$app->response->statusCode = 201;

        return [
            'success' => true,
            'message' => 'Avtomobil muvaffaqiyatli yaratildi',
            'car' => $model,
        ];
    }

    public function updateCar($id)
    {
        $model = $this->findModel($id);

        $data = Yii::$app->request->bodyParams;

        unset($data['user_id'], $data['status'], $data['id']);


        if (!$model->load($data, '')) {
            throw new UnprocessableEntityHttpException('Ma\'lumotlar yuborilmadi');
        }

        if (!$model->validate()) {

            Yii::$app->response->statusCode = 422;
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

    public function deleteCar($id)
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
        $model = Car::findOne([
            'id' => $id,
            'user_id' => Yii::$app->user->id,
            'status' => 1,
        ]);

        if (!$model) {
            throw new NotFoundHttpException('Car not found');
        }

        return $model;
    }

}
