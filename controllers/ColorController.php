<?php

namespace app\controllers;

use app\models\Colors;
use app\services\ColorService\ColorService;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ColorController implements the CRUD actions for Colors model.
 */
class ColorController extends BaseController
{

    public $colorService;

    public function __construct($id, $module, ColorService $colorService, $config = [])
    {
        $this->colorService = $colorService;
        parent::__construct($id, $module, $config);
    }

    /**
     * Lists all Colors models.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->colorService->index();
    }

    /**
     * Displays a single Colors model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->colorService->view($id);
    }

    /**
     * Creates a new Colors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        return $this->colorService->create();
    }

    /**
     * Updates an existing Colors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        return $this->colorService->update($id);
    }

    /**
     * Deletes an existing Colors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        return $this->colorService->delete($id);
    }

}
