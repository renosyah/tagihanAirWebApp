<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengumumanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengumuman-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pengumuman') ?>

    <?= $form->field($model, 'id_kategori') ?>

    <?= $form->field($model, 'judul') ?>

    <?= $form->field($model, 'tgl_berita') ?>

    <?= $form->field($model, 'isi_berita') ?>

    <?php // echo $form->field($model, 'id_admin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
