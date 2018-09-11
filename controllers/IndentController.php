<?php

namespace app\controllers;

use Yii;
use app\models\Indent;
use app\models\IndentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IndentController implements the CRUD actions for Indent model.
 */
class IndentController extends Controller
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
     * Lists all Indent models.
     * @return mixed
     */
    public function actionSmyindent()
    {
        $searchModel = new IndentSearch();
		$searchModel->seller_user_id=Yii::$app->user->id;
		
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('sindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    public function actionBmyindent()
    {
        $searchModel = new IndentSearch();
		$searchModel->buyer_user_id=Yii::$app->user->id;
		
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('bindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    public function actionIndex()
    {
        $searchModel = new IndentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Indent model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Indent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Indent();
				
		if (Yii::$app->request->post()) {
			$model->load(Yii::$app->request->post());
			$model->buyer_user_id=Yii::$app->user->id;
			
			// Indent Status Indent Created
			$model->status=1;
			
			if ($model->save()) {
				return $this->redirect(['index']);
			}
		}

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Indent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Indent model.
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
     * Finds the Indent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Indent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Indent::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
