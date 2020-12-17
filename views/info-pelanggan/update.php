<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InfoPelanggan */

$this->title = 'Update Info Pelanggan: ' . $model->id_pelanggan;
$this->params['breadcrumbs'][] = ['label' => 'Info Pelanggans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pelanggan, 'url' => ['view', 'id' => $model->id_pelanggan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="info-pelanggan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
