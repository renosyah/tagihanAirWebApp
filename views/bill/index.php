<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tagihan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= !Yii::$app->user->isGuest && Yii::$app->user->identity->type_user == 0 ? Html::a('Buat Tagihan', ['create'], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'gridview-bg',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['style' => 'background:white;']
            ],
            [
                'header' => 'Kode Tagihan',
                'attribute' => 'bill_code',
                'contentOptions' => ['style' => 'background:white;']
            ],
            //'issue_to',
            //'issue_from',
            [
                'header' => 'Total',
                'attribute' => 'total',
                'format' => ['decimal',2],
                'contentOptions' => ['style' => 'background:white;']
            ],
            [
                'header' => 'Status Tagihan',
                'attribute' => 'status',
                'value' => function($model){
                    return $model->getStatusText();
                },
                'contentOptions' => ['style' => 'background:white;']
            ],

            !Yii::$app->user->isGuest && Yii::$app->user->identity->type_user == 0 ? ['class' => 'yii\grid\ActionColumn','header' => 'Aksi'] : ['header' => '','visible' => false]
        ]    
    ]); ?>


</div>
