<?php

namespace app\controllers;

use app\models\Models;
use app\services\ReferenceService\ReferenceService;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReferenceController implements the CRUD actions for Models model.
 */
class ReferenceController extends BaseController
{
    private $service;
    public function __construct($id, $module, ReferenceService $service, $config = [])
    {
        $this->service = $service;

        parent::__construct($id, $module, $config);
    }

    /**
     * Lists all Models models.
     *
     * @return string
     */
    public function actionIndex($slug)
    {
        return $this->service->index($slug);
    }

    /**
     * Displays a single Models model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $slug)
    {
        return $this->service->view($id, $slug);
    }

    /**
     * Creates a new Models model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($slug)
    {
        return $this->service->create($slug);
    }

    /**
     * Updates an existing Models model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $slug)
    {
        return $this->service->update($id, $slug);
    }

    /**
     * Deletes an existing Models model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $slug)
    {
        return $this->service->delete($id, $slug);
    }
}
