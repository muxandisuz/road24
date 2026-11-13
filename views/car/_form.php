<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Brands;
use app\models\Models;
use app\models\Colors;

/** @var yii\web\View $this */
/** @var app\models\Cars $model */
/** @var yii\bootstrap5\ActiveForm $form */

// Fetch dropdown options with fallbacks
$brandOptions = [];
try {
    $brandsList = Brands::find()->all();
    if (!empty($brandsList)) {
        $sample = $brandsList[0];
        $labelAttr = $sample->hasAttribute('name') ? 'name' : 'id';
        $brandOptions = ArrayHelper::map($brandsList, 'id', $labelAttr);
    }
} catch (\Throwable $e) {}

$modelOptions = [];
try {
    $modelsList = Models::find()->all();
    if (!empty($modelsList)) {
        $modelOptions = ArrayHelper::map($modelsList, 'id', 'name');
    }
} catch (\Throwable $e) {}

$colorOptions = [];
try {
    $colorsList = Colors::find()->all();
    if (!empty($colorsList)) {
        $colorOptions = ArrayHelper::map($colorsList, 'id', 'name');
    }
} catch (\Throwable $e) {}
?>

<div class="cars-form">

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'needs-validation'],
        ]); ?>

        <!-- Section 1: Asosiy parametrlar -->
        <div class="mb-4">
            <h5 class="fw-bold mb-3 d-flex align-items-center gap-2 text-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C2.1 10.7 2 11 2 11.4V16c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                Asosiy parametrlar
            </h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <?php if (!empty($brandOptions)): ?>
                        <?= $form->field($model, 'brand_id')->dropDownList($brandOptions, [
                            'prompt' => '— Brendni tanlang —',
                            'class' => 'form-select form-select-lg rounded-3',
                        ])->label('Brend', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php else: ?>
                        <?= $form->field($model, 'brand_id')->textInput([
                            'class' => 'form-control form-control-lg rounded-3',
                            'placeholder' => 'Brend ID',
                        ])->label('Brend ID', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php endif; ?>
                </div>

                <div class="col-md-4">
                    <?php if (!empty($modelOptions)): ?>
                        <?= $form->field($model, 'model_id')->dropDownList($modelOptions, [
                            'prompt' => '— Modelni tanlang —',
                            'class' => 'form-select form-select-lg rounded-3',
                        ])->label('Model', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php else: ?>
                        <?= $form->field($model, 'model_id')->textInput([
                            'class' => 'form-control form-control-lg rounded-3',
                            'placeholder' => 'Model ID',
                        ])->label('Model ID', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php endif; ?>
                </div>

                <div class="col-md-4">
                    <?php if (!empty($colorOptions)): ?>
                        <?= $form->field($model, 'color_id')->dropDownList($colorOptions, [
                            'prompt' => '— Rangni tanlang —',
                            'class' => 'form-select form-select-lg rounded-3',
                        ])->label('Rangi', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php else: ?>
                        <?= $form->field($model, 'color_id')->textInput([
                            'class' => 'form-control form-control-lg rounded-3',
                            'placeholder' => 'Rang ID',
                        ])->label('Rang ID', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <hr class="border-light-subtle my-4">

        <!-- Section 2: Texnik xususiyatlar -->
        <div class="mb-4">
            <h5 class="fw-bold mb-3 d-flex align-items-center gap-2 text-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                Texnik xususiyatlar
            </h5>
            <div class="row g-3">
                <div class="col-md-3">
                    <?= $form->field($model, 'year')->textInput([
                        'type' => 'number',
                        'min' => 1950,
                        'max' => 2030,
                        'class' => 'form-control rounded-3',
                        'placeholder' => '2024',
                    ])->label('Ishlab chiqarilgan yili', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'engine_number')->textInput([
                        'maxlength' => true,
                        'class' => 'form-control rounded-3',
                        'placeholder' => 'Masalan: B58B30M1',
                    ])->label('Dvigatel raqami', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                </div>

                <div class="col-md-3">
                    <?= $form->field($model, 'mileage')->textInput([
                        'type' => 'number',
                        'min' => 0,
                        'class' => 'form-control rounded-3',
                        'placeholder' => '0',
                    ])->label('Yurgan masofasi (km)', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                </div>

                <div class="col-md-3">
                    <div class="row g-2">
                        <div class="col-6">
                            <?= $form->field($model, 'seats')->textInput([
                                'type' => 'number',
                                'min' => 1,
                                'max' => 60,
                                'class' => 'form-control rounded-3',
                                'placeholder' => '5',
                            ])->label('O‘rindiq', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                        </div>
                        <div class="col-6">
                            <?= $form->field($model, 'doors')->textInput([
                                'type' => 'number',
                                'min' => 1,
                                'max' => 10,
                                'class' => 'form-control rounded-3',
                                'placeholder' => '4',
                            ])->label('Eshiklar', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="border-light-subtle my-4">

        <!-- Section 3: Narx, Holat va Tavsif -->
        <div class="mb-4">
            <h5 class="fw-bold mb-3 d-flex align-items-center gap-2 text-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                Narx, Holat va Tavsif
            </h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <?= $form->field($model, 'price')->textInput([
                        'type' => 'number',
                        'step' => '0.01',
                        'min' => 0,
                        'class' => 'form-control form-control-lg rounded-3',
                        'placeholder' => 'Masalan: 35000',
                    ])->label('Narxi ($)', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'status')->dropDownList([
                        1 => 'Faol (Mavjud)',
                        0 => 'Nofaol (Sotilgan)',
                    ], [
                        'class' => 'form-select form-select-lg rounded-3',
                    ])->label('Holati', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                </div>

                <div class="col-md-4">
                    <?php if (empty($model->user_id)): ?>
                        <?= $form->field($model, 'user_id')->textInput([
                            'class' => 'form-control form-control-lg rounded-3',
                            'value' => Yii::$app->user->id ?: 1,
                        ])->label('Foydalanuvchi ID', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php else: ?>
                        <?= $form->field($model, 'user_id')->textInput([
                            'class' => 'form-control form-control-lg rounded-3',
                        ])->label('Foydalanuvchi ID', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                    <?php endif; ?>
                </div>

                <div class="col-12">
                    <?= $form->field($model, 'description')->textarea([
                        'rows' => 4,
                        'class' => 'form-control rounded-3',
                        'placeholder' => 'Avtomobil holati, qo‘shimcha imkoniyatlari yoki jihozlari haqida yozing...',
                    ])->label('Qo‘shimcha tavsif', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-2 mt-4 pt-3 border-top border-light-subtle">
            <?= Html::submitButton(
                '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="me-1"><polyline points="20 6 9 17 4 12"/></svg> Saqlash',
                ['class' => 'btn btn-primary rounded-3 px-4 py-2 fw-semibold shadow-sm d-inline-flex align-items-center']
            ) ?>
            <?= Html::a(
                'Bekor qilish',
                ['index'],
                ['class' => 'btn btn-outline-secondary rounded-3 px-4 py-2 fw-semibold']
            ) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
