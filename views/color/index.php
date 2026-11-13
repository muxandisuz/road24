<?php

use app\models\Colors;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Ranglar';
$this->params['breadcrumbs'][] = $this->title;

/**
 * Helper function to determine a representative hex color from name
 */
function getColorHex($name) {
    $lower = mb_strtolower(trim((string)$name));
    $map = [
        'qora' => '#18181b',
        'black' => '#18181b',
        'oq' => '#f8fafc',
        'white' => '#f8fafc',
        'qizil' => '#ef4444',
        'red' => '#ef4444',
        'ko\'k' => '#3b82f6',
        'kok' => '#3b82f6',
        'blue' => '#3b82f6',
        'kulrang' => '#64748b',
        'seriy' => '#64748b',
        'gray' => '#64748b',
        'grey' => '#64748b',
        'kumush' => '#cbd5e1',
        'silver' => '#cbd5e1',
        'yashil' => '#22c55e',
        'green' => '#22c55e',
        'sariq' => '#eab308',
        'yellow' => '#eab308',
        'jigarrang' => '#78350f',
        'brown' => '#78350f',
        'to\'q ko\'k' => '#1e3a8a',
        'dark blue' => '#1e3a8a',
        'oltin' => '#d97706',
        'gold' => '#d97706',
        'binafsha' => '#a855f7',
        'purple' => '#a855f7',
        'mokriy' => '#334155',
        'asfalt' => '#1e293b',
    ];
    return $map[$lower] ?? '#94a3b8';
}
?>
<div class="colors-index py-3">

    <!-- Page Header -->
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
            </div>
            <p class="text-secondary small mb-0">Avtomobillarga biriktirilgan ranglar palitrasi</p>
        </div>

        <div class="d-flex gap-2">
            <?= Html::a(
                '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Yangi rang',
                ['create'],
                ['class' => 'btn btn-primary d-inline-flex align-items-center shadow-sm rounded-3 px-3 py-2 fw-semibold']
            ) ?>
        </div>
    </div>

    <!-- Main Card Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-hover align-middle mb-0'],
                'headerRowOptions' => ['class' => 'bg-light border-bottom'],
                'emptyText' => '<div class="text-center py-5">
                    <div class="mb-3 text-secondary opacity-50">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/>
                        </svg>
                    </div>
                    <h5 class="fw-semibold text-secondary">Hozircha hech qanday rang mavjud emas</h5>
                    <p class="small text-muted mb-3">Yangi rang qo‘shish uchun yuqoridagi tugmadan foydalaning</p>
                    ' . Html::a('+ Yangi rang', ['create'], ['class' => 'btn btn-primary btn-sm rounded-pill px-3']) . '
                </div>',
                'pager' => [
                    'class' => \yii\bootstrap5\LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center p-3 mb-0'],
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\SerialColumn',
                        'headerOptions' => ['class' => 'text-center text-secondary small py-3', 'style' => 'width: 60px;'],
                        'contentOptions' => ['class' => 'text-center fw-semibold text-secondary small align-middle'],
                    ],
                    [
                        'attribute' => 'id',
                        'headerOptions' => ['class' => 'text-secondary small py-3', 'style' => 'width: 80px;'],
                        'contentOptions' => ['class' => 'align-middle'],
                        'format' => 'raw',
                        'value' => fn($model) => '<span class="badge bg-light text-secondary border">#' . $model->id . '</span>',
                    ],
                    [
                        'attribute' => 'name',
                        'label' => 'Rang nomi va namunasi',
                        'headerOptions' => ['class' => 'text-secondary small py-3'],
                        'contentOptions' => ['class' => 'align-middle fw-bold text-dark'],
                        'format' => 'raw',
                        'value' => function ($model) {
                            $hex = getColorHex($model->name);
                            return '<div class="d-flex align-items-center gap-2">
                                <span class="d-inline-block rounded-circle shadow-sm border" style="width: 22px; height: 22px; background-color: ' . Html::encode($hex) . ';"></span>
                                <span class="fw-semibold">' . Html::encode($model->name) . '</span>
                            </div>';
                        },
                    ],
                    [
                        'attribute' => 'created_at',
                        'label' => 'Yaratilgan sana',
                        'headerOptions' => ['class' => 'text-secondary small py-3'],
                        'contentOptions' => ['class' => 'align-middle text-secondary small'],
                        'format' => 'raw',
                        'value' => fn($model) => $model->created_at ? '<span class="d-inline-flex align-items-center gap-1"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>' . Html::encode($model->created_at) . '</span>' : '<span class="text-muted">—</span>',
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'header' => 'Amallar',
                        'headerOptions' => ['class' => 'text-center text-secondary small py-3', 'style' => 'width: 140px;'],
                        'contentOptions' => ['class' => 'text-center align-middle'],
                        'urlCreator' => function ($action, Colors $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a(
                                    '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>',
                                    $url,
                                    ['class' => 'btn btn-sm btn-outline-info rounded-circle p-2 mx-1', 'title' => 'Ko‘rish', 'aria-label' => 'Ko‘rish']
                                );
                            },
                            'update' => function ($url, $model) {
                                return Html::a(
                                    '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>',
                                    $url,
                                    ['class' => 'btn btn-sm btn-outline-primary rounded-circle p-2 mx-1', 'title' => 'Tahrirlash', 'aria-label' => 'Tahrirlash']
                                );
                            },
                            'delete' => function ($url, $model) {
                                return Html::a(
                                    '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>',
                                    $url,
                                    [
                                        'class' => 'btn btn-sm btn-outline-danger rounded-circle p-2 mx-1',
                                        'title' => 'O‘chirish',
                                        'aria-label' => 'O‘chirish',
                                        'data' => [
                                            'confirm' => 'Haqiqatan ham bu rangni o‘chirmoqchimisiz?',
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
