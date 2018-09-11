<?php

namespace app\controllers;

use Yii;
use app\models\Inspection;
use app\models\InspectionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use app\models\ProductIn;
use kartik\mpdf\Pdf;

/**
 * InspectionController implements the CRUD actions for Inspection model.
 */
class InspectionController extends Controller
{
	public $enableCsrfValidation = false;
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
     * Lists all Inspection models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InspectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inspection model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		
		$ProductIn = ProductIn::find()->all();

		$content = $this->renderPartial('view', [
					'model' => $this->findModel($id),
					'ProductIn' => $ProductIn,
				]);
		
		// setup kartik\mpdf\Pdf component
		$pdf = new Pdf([
			// set to use core fonts only
		//	'mode' => Pdf::MODE_CORE, 
			// A4 paper format
			'format' => Pdf::FORMAT_A4, 
			// portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT, 
			// stream to browser inline
			'destination' => Pdf::DEST_BROWSER, 
			// your html content input
			'content' => $content,  
			// format content from your own css file if needed or use the
			// enhanced bootstrap css built by Krajee for mPDF formatting 
			'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
			// any css to be embedded if required
			'cssInline' => '
							table, th, td {
							   border: 1px solid black;
							}table {
								border-collapse: collapse;
							}', 
			 // set mPDF properties on the fly
			'options' => ['title' => 'Ashirvad'],
			 // call mPDF methods on the fly
			'methods' => [ 
				'SetHeader'=>['Ashirvad'], 
				'SetFooter'=>['{PAGENO}'],
			]
		]);
		
		// return the pdf output as per the destination setting
		return $pdf->render(); 
		
		
		
    }

    /**
     * Creates a new Inspection model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inspection();

        if ($model->load(Yii::$app->request->post())) {
			$model->column_included=Json::encode($_POST['Inspection']['column_included']);

			if($model->save()){
				return $this->redirect(['index']);	
			}            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Inspection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Inspection model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Inspection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Inspection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inspection::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
