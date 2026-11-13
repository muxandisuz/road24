<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Models $model */

$this->title = 'Yangi model qo‘shish';
$this->params['breadcrumbs'][] = ['label' => 'Modellar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-create py-3">

    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4 pb-2 border-bottom">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-info-subtle text-info-emphasis p-2 rounded-3">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"/>
                        <circle cx="6.5" cy="16.5" r="2.5"/>
                        <circle cx="16.5" cy="16.5" r="2.5"/>
                    </svg>
                </span>
                <h1 class="h3 fw-bold mb-0"><?= Html::encode($this->title) ?></h1>
            </div>
            <p class="text-secondary small mb-0">Tizimga yangi avtomobil modelini kiriting</p>
        </div>

        <div>
            <?= Html::a(
                '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><polyline points="15 18 9 12 15 6"/></svg> Ro‘yxatga qaytish',
                ['index'],
                ['class' => 'btn btn-outline-secondary rounded-3 px-3 py-2 fw-semibold d-inline-flex align-items-center']
            ) ?>
        </div>
    </div>

    <!-- Form Section -->
    <div class="row">
        <div class="col-lg-8">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>

</div>
