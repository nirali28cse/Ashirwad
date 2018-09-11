<?php

namespace app\controllers;

use Yii;
use app\models\QuantityType;
use app\models\QuantityTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * QuantitytypeController implements the CRUD actions for QuantityType model.
 */
class QuantitytypeController extends Controller
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
     * Lists all QuantityType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new QuantityTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model = new QuantityType();
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single QuantityType model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
/*     public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    } */

    /**
     * Creates a new QuantityType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new QuantityType();

        if (isset($_POST['hasEditable'])) {
			// use Yii's response format to encode output as JSON
			\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			
			// read your posted model attributes
			if ($model->load($_POST)) {
				// read or convert your posted information
				$value = $model->name;
				$model->save();
				// return JSON encoded output in the below format
				 return ['output'=>$value, 'message'=>''];
				// return $this->redirect(['index']);
				// alternatively you can return a validation error
				// return ['output'=>'', 'message'=>'Validation error'];
			}
			// else if nothing to do always return an empty JSON encoded output
			else {
				return ['output'=>'', 'message'=>''];
			}
		}
    }

    /**
     * Updates an existing QuantityType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$post=Yii::$app->request->post();
		$post['QuantityType']= current($post['QuantityType']);
        if ($model->load($post) && $model->save(false)) {
			echo Json::encode(['output' => '', 'message' => '']);
            return;
        }
    }

    /**
     * Deletes an existing QuantityType model.
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
     * Finds the QuantityType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return QuantityType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = QuantityType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
