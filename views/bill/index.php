<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tagihan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= !Yii::$app->user->isGuest && Yii::$app->user->identity->type_user == 0 ? Html::a('Create Bill', ['create'], ['class' => 'btn btn-success']) : '' ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bill_code:ntext',
            //'issue_to',
            //'issue_from',
            'total',
            //'status',

            !Yii::$app->user->isGuest && Yii::$app->user->identity->type_user == 0 ? ['class' => 'yii\grid\ActionColumn'] : 'status',
        ],
    ]); ?>


</div>
