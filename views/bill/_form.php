<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\Bill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bill_code')->textarea(['rows' => 6])->label('Kode Tagihan') ?>

    <?= $form->field($model, 'issue_to')->dropDownList(ArrayHelper::map(User::find()->where(['type_user' => 1])->all(), 'id', 'name'))->label('Dikirim Ke') ?>

    <?= $form->field($model, 'total')->textInput()->label('Total Tagihan') ?>

    <?= $form->field($model, 'status')->dropDownList([1 => 'Belum Lunas',0 => 'Sudah Lunas'])->label('Status Tagihan') ?>

    <br />

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
