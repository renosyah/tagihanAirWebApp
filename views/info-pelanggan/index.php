<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InfoPelangganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Info Pelanggan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-pelanggan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?=  Yii::$app->user->isGuest ? '' : Html::a('Tambah Info Pelanggan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'id' => 'gridview-bg',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_pelanggan',
                'id_bayar',
                'tgl_pembayaran',
                'denda',

                ['class' => 'yii\grid\ActionColumn','visible' => !Yii::$app->user->isGuest],
            ],
        ]); ?>
    </div>



</div>
