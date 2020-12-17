<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengaduan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pengaduan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_pelanggan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'penanganan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_admin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
