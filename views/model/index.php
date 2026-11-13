<?php

use app\models\Models;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Modellar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-index py-3">

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
            <p class="text-secondary small mb-0">Avtomobillarning modellari va turlari ro'yxati</p>
        </div>

        <div class="d-flex gap-2">
            <?= Html::a(
                '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Yangi model',
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
                            <path d="M14 16H9m10 0h3v-3.15a1 1 0 0 0-.84-.99L16 11l-2.7-3.6a1 1 0 0 0-.8-.4H5.24a2 2 0 0 0-1.8 1.1l-.8 1.63A6 6 0 0 0 2 12.42V16h2"/>
                            <circle cx="6.5" cy="16.5" r="2.5"/>
                            <circle cx="16.5" cy="16.5" r="2.5"/>
                        </svg>
                    </div>
                    <h5 class="fw-semibold text-secondary">Hozircha hech qanday model mavjud emas</h5>
                    <p class="small text-muted mb-3">Birinchi modelni kiritish uchun yuqoridagi tugmadan foydalaning</p>
                    ' . Html::a('+ Yangi model', ['create'], ['class' => 'btn btn-primary btn-sm rounded-pill px-3']) . '
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
                        'label' => 'Model nomi',
                        'headerOptions' => ['class' => 'text-secondary small py-3'],
                        'contentOptions' => ['class' => 'align-middle fw-bold text-dark'],
                        'format' => 'raw',
                        'value' => function ($model) {
                            return '<div class="d-flex align-items-center gap-2">
                                <span class="d-inline-flex align-items-center justify-content-center bg-info-subtle text-info rounded-circle" style="width: 32px; height: 32px;">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.5 2.8C2.1 10.7 2 11 2 11.4V16c0 .6.4 1 1 1h2"/><circle cx="7" cy="17" r="2"/><path d="M9 17h6"/><circle cx="17" cy="17" r="2"/></svg>
                                </span>
                                <span>' . Html::encode($model->name) . '</span>
                            </div>';
                        },
                    ],
                    [
                        'attribute' => 'brand_id',
                        'label' => 'Tegishli brend',
                        'headerOptions' => ['class' => 'text-secondary small py-3'],
                        'contentOptions' => ['class' => 'align-middle'],
                        'format' => 'raw',
                        'value' => function ($model) {
                            $brandName = null;
                            if (isset($model->brands)) {
                                $brandName = $model->brands->hasAttribute('name') ? $model->brands->name : null;
                            }
                            if ($brandName) {
                                return '<span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 rounded-pill">' . Html::encode($brandName) . '</span>';
                            }
                            return '<span class="badge bg-secondary-subtle text-secondary border px-2 py-1 rounded-pill">Brend ID: #' . $model->brand_id . '</span>';
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
                        'urlCreator' => function ($action, Models $model, $key, $index, $column) {
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
                                            'confirm' => 'Haqiqatan ham bu modelni o‘chirmoqchimisiz?',
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
