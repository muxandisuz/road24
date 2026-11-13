<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Brands;

/** @var yii\web\View $this */
/** @var app\models\Models $model */
/** @var yii\bootstrap5\ActiveForm $form */

// Try to build a list of brands for dropdown
$brandOptions = [];
try {
    $brandsList = Brands::find()->all();
    if (!empty($brandsList)) {
        $sample = $brandsList[0];
        $labelAttr = $sample->hasAttribute('name') ? 'name' : 'id';
        $brandOptions = ArrayHelper::map($brandsList, 'id', $labelAttr);
    }
} catch (\Throwable $e) {
    $brandOptions = [];
}
?>

<div class="models-form">

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'needs-validation'],
        ]); ?>

        <div class="row g-3">
            <div class="col-md-6">
                <?php if (!empty($brandOptions)): ?>
                    <?= $form->field($model, 'brand_id')->dropDownList($brandOptions, [
                        'prompt' => '— Brendni tanlang —',
                        'class' => 'form-select form-select-lg rounded-3',
                    ])->label('Tegishli Brend', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                <?php else: ?>
                    <?= $form->field($model, 'brand_id', [
                        'inputOptions' => [
                            'class' => 'form-control form-control-lg rounded-3',
                            'placeholder' => 'Brend ID raqamini kiriting',
                        ],
                    ])->textInput()->label('Brend ID', ['class' => 'form-label fw-semibold text-secondary small']) ?>
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'name', [
                    'inputOptions' => [
                        'class' => 'form-control form-control-lg rounded-3',
                        'placeholder' => 'Masalan: X5, M5, Malibu, Tracker...',
                        'autofocus' => true,
                    ],
                ])->label('Model nomi', ['class' => 'form-label fw-semibold text-secondary small']) ?>
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
