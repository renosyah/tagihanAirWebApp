<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BeritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Berita';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Yii::$app->user->isGuest ? '' : Html::a('Tambah Berita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="table-responsive">
        <?= GridView::widget([
            'id' => 'gridview-bg',
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id_berita',
                'judul',
                'tgl_berita',
                'isi_berita:ntext',
                [
                    'attribute' => 'gambar',
                    'format' => 'html',
                    'label' => 'Gambar',
                    'value' => function ($data) {
                        return Html::img(Yii::$app->request->BaseUrl . $data['gambar'],['width' => '300px']);
                },
            ],
                //'id_admin',

                ['class' => 'yii\grid\ActionColumn','visible' => !Yii::$app->user->isGuest],
            ],
        ]); ?>
    </div>



</div>
