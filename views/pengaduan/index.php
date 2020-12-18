<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengaduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengaduan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaduan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Buat Pengaduan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'id' => 'gridview-bg',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_pengaduan',
                'pengaduan:ntext',
                'id_pelanggan',
                'penanganan:ntext',
                'status:ntext',
                //'id_admin',

                ['class' => 'yii\grid\ActionColumn','visible' => !Yii::$app->user->isGuest],
            ],
        ]); ?>
    </div>



</div>
