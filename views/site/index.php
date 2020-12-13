<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Beranda';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Selamat Datang</h1>

        <p class="lead">Ini adalah sistem penagih tagihan air yang dibuat menggunakan framework YII.</p>

        <p><?= Html::a('Masuk Untuk Melihat Tagihan', ['/site/login'], ['class'=>'btn btn-lg btn-success']) ?></p>
    </div>

</div>
