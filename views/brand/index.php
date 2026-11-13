<?php

use app\models\Brands;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Brendlar';
$this->params['breadcrumbs'][] = $this->title;

// Dynamic column detection
$sampleModel = new Brands();
$hasName = $sampleModel->hasAttribute('name');
$hasBrandId = $sampleModel->hasAttribute('brand_id');
?>

<div class="brands-index py-3">

    <!-- Page Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3 mb-4 pb-2 border-bottom">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <span class="badge bg-primary-subtle text-primary p-2 rounded-3">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                    </svg>
                </span>
                <h1 class="h3 fw-bold mb-0"><?= Html::encode($this->title) ?></h1>
            </div>
            <p class="text-secondary small mb-0">Avtomobil ishlab chiqaruvchi brendlar va markalar ro'yxati</p>
        </div>

        <div class="d-flex gap-2">
            <?= Html::a(
                '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="me-1"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Yangi brend',
                ['create'],
                ['class' => 'btn btn-primary d-inline-flex align-items-center shadow-sm rounded-3 px-3 py-2 fw-semibold']
            ) ?>
        </div>
    </div>

    <!-- Main Card Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <?php
            $columns = [
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
            ];

            if ($hasName) {
                $columns[] = [
                    'attribute' => 'name',
                    'label' => 'Brend nomi',
                    'headerOptions' => ['class' => 'text-secondary small py-3'],
                    'contentOptions' => ['class' => 'align-middle fw-bold text-dark'],
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<div class="d-flex align-items-center gap-2">
                            <span class="d-inline-flex align-items-center justify-content-center bg-light text-primary rounded-circle" style="width: 32px; height: 32px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
                            </span>
                            <span>' . Html::encode($model->name) . '</span>
                        </div>';
                    },
                ];
            }

            if ($hasBrandId) {
                $columns[] = [
                    'attribute' => 'brand_id',
                    'label' => 'Brand ID',
                    'headerOptions' => ['class' => 'text-secondary small py-3'],
                    'contentOptions' => ['class' => 'align-middle'],
                    'value' => fn($model) => $model->brand_id,
                ];
                $columns[] = [
                    'attribute' => 'model_id',
                    'label' => 'Model ID',
                    'headerOptions' => ['class' => 'text-secondary small py-3'],
                    'contentOptions' => ['class' => 'align-middle'],
                    'value' => fn($model) => $model->model_id,
                ];
            }

            if ($sampleModel->hasAttribute('created_at')) {
                $columns[] = [
                    'attribute' => 'created_at',
                    'label' => 'Yaratilgan sana',
                    'headerOptions' => ['class' => 'text-secondary small py-3'],
                    'contentOptions' => ['class' => 'align-middle text-secondary small'],
                    'format' => 'raw',
                    'value' => fn($model) => $model->created_at ? '<span class="d-inline-flex align-items-center gap-1"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>' . Html::encode($model->created_at) . '</span>' : '<span class="text-muted">—</span>',
                ];
            }

            $columns[] = [
                'class' => ActionColumn::className(),
                'header' => 'Amallar',
                'headerOptions' => ['class' => 'text-center text-secondary small py-3', 'style' => 'width: 140px;'],
                'contentOptions' => ['class' => 'text-center align-middle'],
                'urlCreator' => function ($action, Brands $model, $key, $index, $column) {
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
                                    'confirm' => 'Haqiqatan ham bu brendni o‘chirmoqchimisiz?',
                                    'method' => 'post',
                                ],
                            ]
                        );
                    },
                ],
            ];
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => ['class' => 'table table-hover align-middle mb-0'],
                'headerRowOptions' => ['class' => 'bg-light border-bottom'],
                'emptyText' => '<div class="text-center py-5">
                    <div class="mb-3 text-secondary opacity-50">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                    </div>
                    <h5 class="fw-semibold text-secondary">Hozircha hech qanday brend mavjud emas</h5>
                    <p class="small text-muted mb-3">Birinchi brendni qo‘shish uchun yuqoridagi tugmadan foydalaning</p>
                    ' . Html::a('+ Yangi brend', ['create'], ['class' => 'btn btn-primary btn-sm rounded-pill px-3']) . '
                </div>',
                'pager' => [
                    'class' => \yii\bootstrap5\LinkPager::class,
                    'options' => ['class' => 'pagination justify-content-center p-3 mb-0'],
                ],
                'columns' => $columns,
            ]); ?>
        </div>
    </div>
</div>
