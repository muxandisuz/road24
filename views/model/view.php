<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Models $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Modellar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="models-view py-3">

    <!-- Header Actions -->
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
                <span class="badge bg-light text-secondary border">ID: <?= $model->id ?></span>
            </div>
            <p class="text-secondary small mb-0">Model va uning biriktirilgan ma'lumotlari</p>
        </div>

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
                        'confirm' => 'Haqiqatan ham ushbu modelni o‘chirmoqchimisiz?',
                        'method' => 'post',
                    ],
                ]
            ) ?>
        </div>
    </div>

    <!-- Details Card -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header bg-transparent py-3 border-bottom border-light-subtle">
                    <h5 class="fw-bold mb-0 d-flex align-items-center gap-2">
                        <svg width="18" height="18" class="text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        Model tafsilotlari
                    </h5>
                </div>
                <div class="card-body p-0">
                    <?= DetailView::widget([
                        'model' => $model,
                        'options' => ['class' => 'table table-hover align-middle mb-0 detail-view-modern'],
                        'attributes' => [
                            [
                                'attribute' => 'id',
                                'format' => 'raw',
                                'value' => '<span class="badge bg-light text-secondary border">#' . $model->id . '</span>',
                            ],
                            [
                                'attribute' => 'name',
                                'label' => 'Model nomi',
                                'format' => 'raw',
                                'value' => '<span class="fw-bold text-dark fs-6">' . Html::encode($model->name) . '</span>',
                            ],
                            [
                                'attribute' => 'brand_id',
                                'label' => 'Tegishli brend',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $brandName = null;
                                    if (isset($model->brands)) {
                                        $brandName = $model->brands->hasAttribute('name') ? $model->brands->name : null;
                                    }
                                    if ($brandName) {
                                        return '<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 rounded-pill fs-7">' . Html::encode($brandName) . '</span>';
                                    }
                                    return '<span class="badge bg-secondary-subtle text-secondary border px-2 py-1 rounded-pill">Brend ID: #' . $model->brand_id . '</span>';
                                },
                            ],
                            [
                                'attribute' => 'created_at',
                                'label' => 'Yaratilgan sana',
                                'value' => $model->created_at ?: '—',
                            ],
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
.detail-view-modern th {
    width: 30%;
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
