<?php

namespace app\controllers;

use Yii;
use app\models\Pengaduan;
use app\models\PengaduanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengaduanController implements the CRUD actions for Pengaduan model.
 */
// class controller untuk
// mengatur halaman dan data yang
// akan ditampilkan
class PengaduanController extends Controller
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pengaduan models.
     * @return mixed
     */
    // fungsi untuk mengatur halaman
    // index dan data yang akan
    // ditampilkan pada halaman
    public function actionIndex()
    {
        $searchModel = new PengaduanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengaduan model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // fungsi untuk mengatur detail data
    // yang akan ditampilkan pada halaman 
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pengaduan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // fungsi untuk mengatur form
    // untuk input data
    public function actionCreate()
    {
        $model = new Pengaduan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pengaduan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengaduan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // fungsi untuk mengatur form
    // untuk menampilkan dan input data
    // yang mana akan diolah dan 
    // diupdate ke database oleh model
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pengaduan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengaduan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    // fungsi untuk mengatur form
    // untuk menampilkan dan input data
    // yang mana akan diolah dan 
    // dihapus dari database oleh model
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengaduan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pengaduan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    // fungsi untuk mengambil satu data
    // berdasarkan id lalu divalidasi
    // apakah ada datanya
    protected function findModel($id)
    {
        if (($model = Pengaduan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
