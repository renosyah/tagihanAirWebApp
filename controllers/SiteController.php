<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\InfoPelangganSearch;

// class controller untuk
// mengatur halaman dan data yang
// akan ditampilkan
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    // fungsi untuk mengatur
    // action dari
    // form yang dikirim
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    // fungsi untuk mengatur
    // action dari
    // form yang dikirim
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    // fungsi untuk mengatur halaman
    // index dan data yang akan
    // ditampilkan pada halaman
    public function actionIndex()
    {
        $searchModel = new InfoPelangganSearch();
        return $this->render('index',[
                'searchModel' => $searchModel
            ]
        );
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    // fungsi yang akan mengatur
    // dan mengolah data login
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    // fungsi yang akan mengatur
    // dan menghapus session login
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    /**
     * Displays about page.
     *
     * @return string
     */
    // fungsi yang akan mengatur
    // dan menampilkan tapilan about
    public function actionAbout()
    {
        return $this->render('about');
    }
}
