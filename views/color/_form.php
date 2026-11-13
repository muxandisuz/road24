<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Colors $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="colors-form">

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'needs-validation'],
        ]); ?>

        <div class="row g-3">
            <div class="col-md-8">
                <?= $form->field($model, 'name', [
                    'inputOptions' => [
                        'class' => 'form-control form-control-lg rounded-3',
                        'placeholder' => 'Masalan: Oq (White), Qora (Black), Qizil (Red)...',
                        'autofocus' => true,
                    ],
                ])->label('Rang nomi', ['class' => 'form-label fw-semibold text-secondary small']) ?>
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
