<?php

namespace app\controllers;

use app\services\CarService\CarService;

class CarController extends BaseController
{

    private $carService;

    public function __construct($id, $module, CarService  $carService, $config = [])
    {
        $this->carService = $carService;
        parent::__construct($id, $module, $config);
    }

    // GET /cars
    public function actionIndex()
    {
        return $this->carService->getCars();
    }

    // GET /cars/1
    public function actionView($id)
    {
        return $this->carService->getCar($id);
    }

    // POST /cars
    public function actionCreate()
    {
        return $this->carService->createCar();
    }
    // PUT/PATCH /cars/1
    public function actionUpdate($id)
    {
        return $this->carService->updateCar($id);
    }

    // DELETE /cars/1
    public function actionDelete($id)
    {
        return $this->carService->deleteCar($id);
    }
}
