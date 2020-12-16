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
    <div class="jumbotron">
        <h1>Selamat Datang</h1>

        <p class="lead">Ini adalah sistem penagih tagihan air yang dibuat menggunakan framework YII 2.</p>
    
        <div class="bill-search">
          <?php $form = ActiveForm::begin([
              'action' => ['bill/index'],
              'method' => 'get',
          ]); ?>
          <?= $form->field($searchModel, 'issue_to')->label('Id User Anda') ?>
          <div class="form-group">
              <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
          </div>
          <?php ActiveForm::end(); ?>
        </div>

    </div>
    </div>
  </div>
</div>


</div>
