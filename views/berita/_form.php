<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Berita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="berita-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_berita')->widget(\yii\jui\DatePicker::className(), [
        'options' => ['class' => 'form-control']
    ]) ?>

    <?= $form->field($model, 'isi_berita')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file_gambar')->fileInput() ?>

    <?= $form->field($model, 'id_admin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
