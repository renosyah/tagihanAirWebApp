<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InfoPelanggan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-pelanggan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pelanggan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bayar')->textInput() ?>

    <?= $form->field($model, 'tgl_pembayaran')->textInput() ?>

    <?= $form->field($model, 'denda')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
