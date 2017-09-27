<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use kartik\mpdf\Pdf;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if(Yii::$app->request->get('export')) {
            return $this->exportExcel(Yii::$app->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        /*$referrer = Yii::$app->request->referrer;*/

        if ($model->load(Yii::$app->request->post())) {

            /*$referrer = $_POST['referrer'];
*/
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);

            $foto = UploadedFile::getInstance($model,'foto');
            if($foto !== null){
                $model->foto = $foto->baseName . Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s')) . '.' . $foto->extension;
            }

            if($model->save()) {
                if ($foto!==null) {
                        $path = Yii::getAlias('@app').'/web/uploads/';
                        $foto->saveAs($path.$model->foto, false);
                }
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['view', 'id' => $model->id]);
            }

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');

        }

        return $this->render('create', [
            'model' => $model,
            /*'referrer'=>$referrer*/
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
         $model = $this->findModel($id);

        $foto_lama = $model->foto;

        if ($model->load(Yii::$app->request->post()) ) {

             $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);

            $foto = UploadedFile::getInstance($model,'foto');
             if($foto !== null){
                $model->foto = $foto->baseName . Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s')) . '.' . $foto->extension;
            } else {
                $model->foto = $foto_lama;
            }

            if($model->save()) {
                    if ($foto!==null) {
                        $path = Yii::getAlias('@app').'/web/uploads/';
                        $foto->saveAs($path.$model->foto, false);
                     }
            Yii::$app->session->setFlash('success','Data berhasil disimpan.');
            return $this->redirect(['view', 'id' => $model->id]);
            } 

            Yii::$app->session->setFlash('error','Data gagal disimpan. Silahkan periksa kembali isian Anda.');
        }

            return $this->render('update', [
                'model' => $model,
            ]);
        
    }
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if($model->delete()) {
            Yii::$app->session->setFlash('success','Data berhasil dihapus');
        } else {
            Yii::$app->session->setFlash('error','Data gagal dihapus');
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     public function actionViewExportPdf($id)
    {
        // get your HTML raw content without any layouts or scripts
        $model = $this->findModel($id);
        $content = '';
        $content .= $this->renderPartial('_viewPdf', ['model' => $model]);
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'marginTop' => 5,
            'marginLeft' => 5,
            'marginRight' => 5,
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            'defaultFont' => 'times',
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:22px}',
             // set mPDF properties on the fly
            'options' => ['title' => 'Report Detail Buku'],
             // call mPDF methods on the fly
        ]);
        // return the pdf output as per the destination setting
        return $pdf->render();
    }    
}
