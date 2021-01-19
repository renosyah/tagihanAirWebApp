<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Beranda';
?>

<div class="site-index">

<div class="container">
  <div class="row">
    <div class="col-sm-3">
       
    </div>
    <div class="col-sm-3">
       
    </div>
    <div class="col-sm-6">
 
        <h1><b>Selamat Datang</b></h1>
        <p class="lead">Ini adalah sistem penagih tagihan air yang dibuat menggunakan framework YII 2.</p>
        
        <?php if (Yii::$app->user->isGuest){ ?>
            <?php $form = ActiveForm::begin([
                'action' => ['info-pelanggan/index'],
                'method' => 'get'
            ]); ?>
            <?= $form->field($searchModel, 'id_pelanggan')->label('Id Pelanggan Anda')->textInput(['autofocus' => true,'required'=>true]) ?>
            <div class="form-group">
              <?= Html::submitButton('Cari', ['class' => 'btn btn-lg btn-primary']) ?>
              <?= Html::resetButton('Reset', ['class' => 'btn btn-lg btn-default']) ?>
            </div>
            <?php ActiveForm::end(); ?>
          <?php } ?>

    </div>
  </div>
</div>


</div>
