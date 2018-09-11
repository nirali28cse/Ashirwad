<?php

namespace app\controllers;

use Yii;
use app\models\Potency;
use app\models\PotencySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * PotencyController implements the CRUD actions for Potency model.
 */
class PotencyController extends Controller
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
     * Lists all Potency models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PotencySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model = new Potency();
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Potency model.
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
     * Creates a new Potency model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Potency();
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
	
	
/*         if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]); */
    }

    /**
     * Updates an existing Potency model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$post=Yii::$app->request->post();
		$post['Potency']= current($post['Potency']);
        if ($model->load($post) && $model->save(false)) {
			echo Json::encode(['output' => '', 'message' => '']);
            return;
        }

/*         return $this->render('update', [
            'model' => $model,
        ]); */
    }

    /**
     * Deletes an existing Potency model.
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
     * Finds the Potency model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Potency the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Potency::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
