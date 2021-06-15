<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengaduanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaduan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id_pengaduan') ?>

    <?php // $form->field($model, 'pengaduan') ?>

    <?php // $form->field($model, 'id_pelanggan') ?>

    <?php // $form->field($model, 'penanganan') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'id_admin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
