<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = 'Update Pengaduan: ' . $model->id_pengaduan;
$this->params['breadcrumbs'][] = ['label' => 'Pengaduan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengaduan, 'url' => ['view', 'id' => $model->id_pengaduan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengaduan-update" style="background-color : white; padding:50px">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
