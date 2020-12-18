<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PengumumanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengumumen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengumuman-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?=  Yii::$app->user->isGuest ? '' : Html::a('Create Pengumuman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'id' => 'gridview-bg',
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pengumuman',
            'id_kategori',
            'judul',
            'tgl_berita',
            'isi_berita:ntext',
            //'id_admin',

            ['class' => 'yii\grid\ActionColumn','visible' => !Yii::$app->user->isGuest],
        ],
    ]); ?>


</div>
