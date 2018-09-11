<?php

namespace app\controllers;

use Yii;
use app\models\ProductType;
use app\models\ProductTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * ProducttypeController implements the CRUD actions for ProductType model.
 */
class ProducttypeController extends Controller
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
     * Lists all ProductType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$model = new ProductType();
		
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single ProductType model.
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
     * Creates a new ProductType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductType();
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
     * Updates an existing ProductType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

		$post=Yii::$app->request->post();
		$post['ProductType']= current($post['ProductType']);
        if ($model->load($post) && $model->save(false)) {
			echo Json::encode(['output' => '', 'message' => '']);
            return;
        }
    }

    /**
     * Deletes an existing ProductType model.
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
     * Finds the ProductType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductType::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
