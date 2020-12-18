<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InfoPelanggan */

$this->title = 'Tambah Info Pelanggan';
$this->params['breadcrumbs'][] = ['label' => 'Info Pelanggan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-pelanggan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
