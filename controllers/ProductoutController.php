<?php

namespace app\controllers;

use Yii;
use app\models\ProductOut;
use app\models\ProductOutSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Indent;
use app\models\ProductIn;
/**
 * ProductoutController implements the CRUD actions for ProductOut model.
 */
class ProductoutController extends Controller
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
     * Lists all ProductOut models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductOutSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSmyorder()
    {
        $searchModel = new ProductOutSearch();
		$searchModel->seller_user_id=Yii::$app->user->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('sindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
    public function actionBmyorder()
    {
        $searchModel = new ProductOutSearch();
		$searchModel->buyer_user_id=Yii::$app->user->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('bindex', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single ProductOut model.
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
     * Creates a new ProductOut model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductOut();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'indent' => null,
        ]);
    }
	
    public function actionCreateorder($inid)
    {
        $model = new ProductOut();

		$indent = Indent::findOne($inid);
		
		if (Yii::$app->request->post()) {
			$model->load(Yii::$app->request->post());
			$model->indent_id=$inid;
			$model->seller_user_id=Yii::$app->user->id;
			$model->buyer_user_id=$indent->buyer_user_id;
			$model->product_type_id=$indent->product_type_id;
			$model->potency_id=$indent->potency_id;
			$model->quantity_type_id=$indent->quantity_type_id;
			$model->product_id=$indent->product_id;


			if ($model->save()) {
			    // Indent Status Change to Order Create
				$indent->status=2;
			    $indent->save(false);
				return $this->redirect(['index']);
			}
		}
        return $this->render('create', [
            'model' => $model,
            'indent' => $indent,
        ]);
    }

    /**
     * Updates an existing ProductOut model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$inid=$model->indent_id;
		$indent = null;
		if($inid>0){
			$indent = Indent::findOne($inid);
		}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $status=$indent->status;
			if ($model->status==1) $status=2;
			if ($model->status==2) $status=3;
			if ($model->status==3) $status=4;

			// Indent Status Change to Order Create
			$indent->status=$status;
			$indent->save(false);
			return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'indent' => $indent,
        ]);
    }

    /**
     * Deletes an existing ProductOut model.
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
     * Finds the ProductOut model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductOut the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductOut::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
