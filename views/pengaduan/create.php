<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pengaduan */

$this->title = 'Buat Pengaduan';
$this->params['breadcrumbs'][] = ['label' => 'Pengaduan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengaduan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
