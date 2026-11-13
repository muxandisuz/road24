<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cars $model */

$brandName = (isset($model->brands) && $model->brands->hasAttribute('name')) ? $model->brands->name : ('Brend #' . $model->brand_id);
$modelName = isset($model->models) ? $model->models->name : ('Model #' . $model->model_id);
$carFullTitle = $brandName . ' ' . $modelName;

$this->title = $carFullTitle;
$this->params['breadcrumbs'][] = ['label' => 'Avtomobillar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cars-view py-3">

    <!-- Top Showcase Banner -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-body">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center gap-4">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-1 rounded-pill">
                            <?= Html::encode($brandName) ?>
                        </span>
                        <?php if ((int)$model->status === 1): ?>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-1 rounded-pill">
                                <span class="d-inline-block rounded-circle bg-success me-1" style="width:6px; height:6px;"></span> Faol / Mavjud
                            </span>
                        <?php else: ?>
                            <span class="badge bg-secondary-subtle text-secondary border px-3 py-1 rounded-pill">
                                <span class="d-inline-block rounded-circle bg-secondary me-1" style="width:6px; height:6px;"></span> Nofaol
                            </span>
                        <?php endif; ?>
                    </div>
                    <h1 class="display-6 fw-bold mb-1 text-dark"><?= Html::encode($modelName) ?></h1>
                    <p class="text-secondary mb-0">ID: #<?= $model->id ?> &bull; Kiritilgan sana: <?= $model->created_at ?: '—' ?></p>
                </div>

                <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-center gap-3">
                    <?php if ($model->price !== null): ?>
                        <div class="bg-success-subtle text-success p-3 rounded-4 text-center text-sm-end">
                            <span class="small text-secondary d-block">Narxi:</span>
                            <span class="h2 fw-bold mb-0">$<?= number_format((float)$model->price, 0, '.', ' ') ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex gap-2">
                        <?= Html::a(
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><polyline points="15 18 9 12 15 6"/></svg> Orqaga',
                            ['index'],
                            ['class' => 'btn btn-outline-secondary rounded-3 px-3 py-2 fw-semibold d-inline-flex align-items-center']
                        ) ?>
                        <?= Html::a(
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Tahrirlash',
                            ['update', 'id' => $model->id],
                            ['class' => 'btn btn-primary rounded-3 px-3 py-2 fw-semibold d-inline-flex align-items-center shadow-sm']
                        ) ?>
                        <?= Html::a(
                            '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg> O‘chirish',
                            ['delete', 'id' => $model->id],
                            [
                                'class' => 'btn btn-outline-danger rounded-3 px-3 py-2 fw-semibold d-inline-flex align-items-center',
                                'data' => [
                                    'confirm' => 'Haqiqatan ham bu avtomobilni o‘chirmoqchimisiz?',
                                    'method' => 'post',
                                ],
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body text-center">
                <div class="text-secondary small mb-1">Ishlab chiqarilgan yili</div>
                <div class="h4 fw-bold mb-0 text-primary"><?= $model->year ?: '—' ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body text-center">
                <div class="text-secondary small mb-1">Yurgan masofasi</div>
                <div class="h4 fw-bold mb-0 text-dark"><?= $model->mileage !== null ? number_format((float)$model->mileage, 0, '.', ' ') . ' km' : '—' ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body text-center">
                <div class="text-secondary small mb-1">O‘rindiqlar</div>
                <div class="h4 fw-bold mb-0 text-dark"><?= $model->seats ?: '—' ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-body text-center">
                <div class="text-secondary small mb-1">Eshiklar soni</div>
                <div class="h4 fw-bold mb-0 text-dark"><?= $model->doors ?: '—' ?></div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Main Specifications Card -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-transparent py-3 border-bottom border-light-subtle">
                    <h5 class="fw-bold mb-0 d-flex align-items-center gap-2">
                        <svg width="18" height="18" class="text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        Texnik xususiyatlar va parametrlar
                    </h5>
                </div>
                <div class="card-body p-0">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table table-hover align-middle mb-0 detail-view-modern'],
                        'attributes' => [
                            [
                                'attribute' => 'id',
                                'label' => 'ID raqami',
                                'format' => 'raw',
                                'value' => '<span class="badge bg-light text-secondary border">#' . $model->id . '</span>',
                            ],
                            [
                                'attribute' => 'brand_id',
                                'label' => 'Brend',
                                'value' => $brandName,
                            ],
                            [
                                'attribute' => 'model_id',
                                'label' => 'Model',
                                'value' => $modelName,
                            ],
                            [
                                'attribute' => 'color_id',
                                'label' => 'Rangi',
                                'value' => isset($model->colors) ? $model->colors->name : ('Rang #' . $model->color_id),
                            ],
                            [
                                'attribute' => 'engine_number',
                                'label' => 'Dvigatel raqami',
                                'value' => $model->engine_number ?: '—',
                            ],
                            [
                                'attribute' => 'user_id',
                                'label' => 'Foydalanuvchi / Egasi',
                                'value' => isset($model->users) ? $model->users->username : ('User #' . $model->user_id),
                            ],
                            [
                                'attribute' => 'created_at',
                                'label' => 'Kiritilgan sana',
                                'value' => $model->created_at ?: '—',
                            ],
                            [
                                'attribute' => 'updated_at',
                                'label' => 'Oxirgi o‘zgarish',
                                'value' => $model->updated_at ?: '—',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <!-- Description & Notes -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-transparent py-3 border-bottom border-light-subtle">
                    <h5 class="fw-bold mb-0 d-flex align-items-center gap-2">
                        <svg width="18" height="18" class="text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        Qo‘shimcha tavsif
                    </h5>
                </div>
                <div class="card-body p-4">
                    <?php if (!empty($model->description)): ?>
                        <div class="p-3 bg-light rounded-3 text-secondary" style="white-space: pre-wrap; font-size: 0.95rem; line-height: 1.6;">
                            <?= Html::encode($model->description) ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted small mb-0 fst-italic">Ushbu avtomobil uchun hech qanday qo‘shimcha tavsif yozilmagan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
.detail-view-modern th {
    width: 32%;
    color: var(--bs-secondary-color);
    font-size: 0.875rem;
    font-weight: 600;
    padding: 1rem 1.25rem;
    background-color: var(--bs-tertiary-bg);
    border-bottom: 1px solid var(--bs-border-color-translucent);
}
.detail-view-modern td {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid var(--bs-border-color-translucent);
}
</style>
