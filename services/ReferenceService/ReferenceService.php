<?php

namespace app\services\ReferenceService;

use app\models\Brands;
use app\models\Colors;
use app\models\Models;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\UnprocessableEntityHttpException;

class ReferenceService
{

    private array $models = [
        'color' => Colors::class,
        'brand' => Brands::class,
        'model' => Models::class,
    ];
    private function getModelClass(string $slug): string
    {
        if (!isset($this->models[$slug])) {
            throw new NotFoundHttpException('Page not found');
        }

        return $this->models[$slug];
    }

    public function index(string $slug)
    {
        $modelClass = $this->getModelClass($slug);

        $query = $modelClass::find();

        $request = Yii::$app->request;

//        $provider = new ActiveDataProvider([
//            'query' => $query->orderBy(['id' => SORT_ASC]),
//            'pagination' => [
//                'pageSize' => $request->get('per-page', 10),
//                'pageSizeLimit' => [1, 100],
//            ],
//        ]);

        return [
            'success' => true,
            'dataProvider' => $query->all(),
        ];
    }


    public function view(int $id, string $slug)
    {
        $modelClass = $this->getModelClass($slug);
        $model = $modelClass::findOne($id);

        return [
            'success' => true,
            'Model' => $model,
        ];
    }
    public function create(string $slug)
    {

        $modelClass = $this->getModelClass($slug);

        $model = new $modelClass();
        $data = Yii::$app->request->bodyParams;

        if (!$model->load($data, ''))
        {
            throw new \yii\web\UnprocessableEntityHttpException('Ma\'lumotlar yuborilmadi');
        }

        if (!$model->validate()) {
            Yii::$app->response->statusCode = 422;

            return [
                'success' => false,
                'errors' => $model->errors,
            ];
        }

        if (!$model->save(false)) {
            throw new UnprocessableEntityHttpException(
                'Model saqlashda xatolik'
            );
        }

        Yii::$app->response->statusCode = 201;

        return [
            'success' => true,
            'message' => 'Model muvaffaqiyatli yaratildi',
            'brand' => $model,
        ];

    }

    public function update(int $id, string $slug)
    {
        $modelClass = $this->getModelClass($slug);

        $model = $modelClass::findOne($id);

        $data = Yii::$app->request->bodyParams;

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
            throw new UnprocessableEntityHttpException('Model update failed');
        }

        return [
            'success' => true,
            'message' => 'Model updated successfully',
            'data' => $model,
        ];
    }

    public function delete(int $id, string $slug)
    {
        $modelClass = $this->getModelClass($slug);
        $model = $modelClass::findOne($id);
        $model->delete();
        return [
            'success' => true,
            'message' => 'Model deleted successfully',
        ];
    }

}
