<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Colors $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ranglar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

function getColorHexView($name) {
    $lower = mb_strtolower(trim((string)$name));
    $map = [
        'qora' => '#18181b', 'black' => '#18181b',
        'oq' => '#f8fafc', 'white' => '#f8fafc',
        'qizil' => '#ef4444', 'red' => '#ef4444',
        'ko\'k' => '#3b82f6', 'kok' => '#3b82f6', 'blue' => '#3b82f6',
        'kulrang' => '#64748b', 'seriy' => '#64748b', 'gray' => '#64748b', 'grey' => '#64748b',
        'kumush' => '#cbd5e1', 'silver' => '#cbd5e1',
        'yashil' => '#22c55e', 'green' => '#22c55e',
        'sariq' => '#eab308', 'yellow' => '#eab308',
        'jigarrang' => '#78350f', 'brown' => '#78350f',
        'to\'q ko\'k' => '#1e3a8a', 'dark blue' => '#1e3a8a',
        'oltin' => '#d97706', 'gold' => '#d97706',
        'binafsha' => '#a855f7', 'purple' => '#a855f7',
        'mokriy' => '#334155', 'asfalt' => '#1e293b',
    ];
    return $map[$lower] ?? '#94a3b8';
}
$colorHex = getColorHexView($model->name);
?>
<div class="colors-view py-3">

    <!-- Header Actions -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4 pb-2 border-bottom">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-warning-subtle text-warning-emphasis p-2 rounded-3">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="13.5" cy="6.5" r=".5" fill="currentColor"/>
                        <circle cx="17.5" cy="10.5" r=".5" fill="currentColor"/>
                        <circle cx="8.5" cy="7.5" r=".5" fill="currentColor"/>
                        <circle cx="6.5" cy="12.5" r=".5" fill="currentColor"/>
                        <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/>
                    </svg>
                </span>
                <h1 class="h3 fw-bold mb-0"><?= Html::encode($this->title) ?></h1>
                <span class="badge bg-light text-secondary border">ID: <?= $model->id ?></span>
            </div>
            <p class="text-secondary small mb-0">Rang parametri va uning xususiyatlari</p>
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
                        'confirm' => 'Haqiqatan ham ushbu rangni o‘chirmoqchimisiz?',
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
                <div class="card-header bg-transparent py-3 border-bottom border-light-subtle d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 d-flex align-items-center gap-2">
                        <svg width="18" height="18" class="text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                        Rang parametrlari
                    </h5>
                    <div class="d-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-light border">
                        <span class="d-inline-block rounded-circle border shadow-sm" style="width: 16px; height: 16px; background-color: <?= Html::encode($colorHex) ?>;"></span>
                        <span class="small fw-semibold text-secondary"><?= Html::encode($model->name) ?></span>
                    </div>
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
                                'label' => 'Rang nomi va namunasi',
                                'format' => 'raw',
                                'value' => '<div class="d-flex align-items-center gap-3">
                                    <span class="d-inline-block rounded-circle border shadow-sm" style="width: 28px; height: 28px; background-color: ' . Html::encode($colorHex) . ';"></span>
                                    <span class="fw-bold text-dark fs-6">' . Html::encode($model->name) . '</span>
                                </div>',
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
