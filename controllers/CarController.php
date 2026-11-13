<?php

namespace app\controllers;

use app\models\Cars;
use app\services\CarService\CarService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * CarController implements the CRUD actions for Cars model.
 */
class CarController extends BaseController
{
    public $carService;

    /**
     * @inheritDoc
     */
    public function __construct($id, $module, CarService $carService, $config = [])
    {
        $this->carService = $carService;
        parent::__construct($id, $module, $config);
    }

    /**
     * Lists all Cars models.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->carService->index();
    }

    /**
     * Displays a single Cars model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->carService->view($id);
    }

    /**
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        return $this->carService->create();
    }

    /**
     * Updates an existing Cars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        return $this->carService->update($id);
    }

    /**
     * Deletes an existing Cars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        return $this->carService->delete($id);
    }
}
