<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => Yii::$app->user->isGuest ? ([
            ['label' => 'Beranda', 'url' => ['/site/index']],
            //['label' => 'Berita', 'url' => ['/berita/index']],
            ['label' => 'Pengumuman', 'url' => ['/pengumuman/index']],
            //['label' => 'Pelanggan', 'url' => ['/pelanggan/index']],
            //['label' => 'Info Pelanggan', 'url' => ['/info-pelanggan/index']],
            ['label' => 'Pengaduan', 'url' => ['/pengaduan/index']],
            ['label' => 'Tentang', 'url' => ['/site/about']],
            ['label' => 'Login Admin', 'url' => ['/site/login']]
        ]) : [
            ['label' => 'Beranda', 'url' => ['/site/index']],
            //['label' => 'Berita', 'url' => ['/berita/index']],
            ['label' => 'Pengumuman', 'url' => ['/pengumuman/index']],
            ['label' => 'Pelanggan', 'url' => ['/pelanggan/index']],
            ['label' => 'Info Pelanggan', 'url' => ['/info-pelanggan/index']],
            ['label' => 'Pengaduan', 'url' => ['/pengaduan/index']],
            ['label' => 'Tentang', 'url' => ['/site/about']],
            (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->nama . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ]
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => [
                'label' => 'Beranda',
                'url' => '/site/index',
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Anton <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
