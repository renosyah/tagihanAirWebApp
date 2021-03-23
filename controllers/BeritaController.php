<?php

namespace app\controllers;

use Yii;
use app\models\Berita;
use app\models\BeritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BeritaController implements the CRUD actions for Berita model.
 */
// class controller untuk
// mengatur halaman dan data yang
// akan ditampilkan
class BeritaController extends Controller
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
     * Lists all Berita models.
     * @return mixed
     */
    // fungsi untuk mengatur halaman
    // index dan data yang akan
    // ditampilkan pada halaman
    public function actionIndex()
    {
        $searchModel = new BeritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Berita model.
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
     * Creates a new Berita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // fungsi untuk mengatur form
    // untuk input data
    public function actionCreate()
    {
        $model = new Berita();

        if ($model->file_gambar = UploadedFile::getInstance($model, 'file_gambar')){

            $path = 'uploads/' . $model->file_gambar->baseName . '.' . $model->file_gambar->extension;
            $model->file_gambar->saveAs($path);
            $model->gambar = '/'.$path;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_berita]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Berita model.
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
        
        if ($model->file_gambar = UploadedFile::getInstance($model, 'file_gambar')){

            $path = 'uploads/' . $model->file_gambar->baseName . '.' . $model->file_gambar->extension;
            $model->file_gambar->saveAs($path);
            $model->gambar = '/'.$path;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_berita]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Berita model.
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
     * Finds the Berita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Berita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    // fungsi untuk mengambil satu data
    // berdasarkan id lalu divalidasi
    // apakah ada datanya
    protected function findModel($id)
    {
        if (($model = Berita::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
