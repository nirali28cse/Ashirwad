<?php

namespace app\controllers;

use Yii;
use app\models\ProductIn;
use app\models\ProductInSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ProductOut;
use app\models\Indent;
/**
 * ProductinController implements the CRUD actions for ProductIn model.
 */
class ProductinController extends Controller
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
     * Lists all ProductIn models.
     * @return mixed
     */
    public function actionBmyproduct()
    {
        $searchModel = new ProductInSearch();
		$searchModel->buyer_user_id=Yii::$app->user->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('bmyproduct', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }   

	public function actionIndex()
    {
        $searchModel = new ProductInSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductIn model.
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
     * Creates a new ProductIn model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($poutid)
    {
        $model = new ProductIn();
		$productout = ProductOut::findOne($poutid);
	
        if ($model->load(Yii::$app->request->post())) {
			$model->product_out_id=$poutid;
			$model->seller_user_id=$productout->seller_user_id;
			$model->buyer_user_id=Yii::$app->user->id;
			$model->product_type_id=$productout->product_type_id;
			$model->potency_id=$productout->potency_id;
			$model->quantity_type_id=$productout->quantity_type_id;
			$model->product_id=$productout->product_id;
			$model->total_qty=$productout->total_qty;	

		    if($model->save()){
				// product out Status Change to Order Create
				$productout->status=$model->status;
				$productout->save(false);
				
				// Indent Status Change to Order Create
				$inid=$productout->indent_id;
				if($inid>0){
					$indent=Indent::findOne($inid);
					$indent->status=4;
					$indent->save(false);
				}
				
				return $this->redirect(['index']);
			}
        }

        return $this->render('create', [
            'model' => $model,
            'productout' => $productout,
            'poutid' => $poutid,
        ]);
    }
	
	public function actionDcreate()
    {
        $model = new ProductIn();
		$productout = null;
		$poutid = 0;
	
        if ($model->load(Yii::$app->request->post())) {
			$model->product_out_id=$poutid;
			$model->buyer_user_id=Yii::$app->user->id;

		    if($model->save()){
				// product out Status Change to Order Create
				$productout->status=$model->status;
				$productout->save(false);
				
				// Indent Status Change to Order Create
				$inid=$productout->indent_id;
				if($inid>0){
					$indent=Indent::findOne($inid);
					$indent->status=4;
					$indent->save(false);
				}
				
				return $this->redirect(['index']);
			}
        }

        return $this->render('create', [
            'model' => $model,
            'productout' => $productout,
            'poutid' => $poutid,
        ]);
    }

    /**
     * Updates an existing ProductIn model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$productout = null;
        $model = $this->findModel($id);
		$poutid=$model->product_out_id;
		$productout = ProductOut::findOne($poutid);
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'productout' => $productout,
            'poutid' => $poutid,
        ]);
    }

    /**
     * Deletes an existing ProductIn model.
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
     * Finds the ProductIn model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductIn the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductIn::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
