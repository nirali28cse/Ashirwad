<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\CSVReader;
use ruskid\csvimporter\ImportInterface;
use ruskid\csvimporter\MultipleImportStrategy;
use ruskid\csvimporter\BaseImportStrategy;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
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
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	
public function actionUploadcsv()
	{

		$model = new Product;		

		if(isset($_POST['Product']['product_type_id']) and 
			isset($_POST['Product']['potency_id']) and 
			isset($_POST['Product']['quantity_type_id']) and 
			isset($_POST['Product']['name'])  
		)
		{	

			$file = \yii\web\UploadedFile::getInstance($model,'name');

			# tab delimited, and encoding conversion
			$importer = new CSVImporter;
			$importer->setData(new CSVReader([
				'filename' => $file->tempName,
				'fgetcsvOptions' => [
					'delimiter' => ','
				]
			]));

				$importer->import(new MultipleImportStrategy([
				'tableName' => Product::tableName(),
				'configs' => [
					[
						'attribute' => 'product_type_id',
						'value' => function($line) {
							return $_POST['Product']['product_type_id'];
						},
					],
					[
						'attribute' => 'potency_id',
						'value' => function($line) {
							return $_POST['Product']['potency_id'];
						},
					],
					[
						'attribute' => 'quantity_type_id',
						'value' => function($line) {
							return $_POST['Product']['quantity_type_id'];
						},
					],
					[
						'attribute' => 'name',
						'value' => function($line) {
							return $line[0];
						},
					],
					[
						'attribute' => 'abbreviations',
						'value' => function($line) {
							return $line[1];
						},
					],		
					[
						'attribute' => 'status',
						'value' => function($line) {
							return $line[2];
						},
					],	
					/* [
						'attribute' => 'date_of_purchase',
						'value' => function($line) {
							return $line[5];
						},
					],
					[
						'attribute' => 'date_of_mfg',
						'value' => function($line) {
							return $line[6];
						},
					],
					[
						'attribute' => 'date_of_expiry',
						'value' => function($line) {
							return $line[7];
						},
					],	
					[
						'attribute' => 'issue_date',
						'value' => function($line) {
							return $line[8];
						},
					],	
					[
						'attribute' => 'total_in',
						'value' => function($line) {
							return $line[9];
						},
					],
					[
						'attribute' => 'total_out',
						'value' => function($line) {
							return $line[10];
						},
					],	
					[
						'attribute' => 'balance',
						'value' => function($line) {
							return $line[11];
						},
					], */
					
				],
				//All ACTIVE categories that don't have name set to 'MS_SQLSERVER' or empty will be imported.
 				'skipImport' => function($line){

					if($line[0] == 'MS_SQLSERVER' || $line[0] == ""){
						return true;
					}
/* 					if($line[2] == 'NOT ACTIVE'){
						return true;
					} */
				}          
			]));
			
/*
			$all=array();
			$all1=array();



	 	if($csvuser <= 2000){
	
		$already_exist_sabhasad_no=array();
		$info=array();
		
		foreach ($csv->data as $key => $line){
	
				$product_id=0;
				$name=null;
				$abbreviations=null;
				$date_of_purchase=null;
				$date_of_mfg=null;
				$date_of_expiry=null;
				$issue_date=null;
				$total_in=0;
				$total_out=0;		
				$balance=0;
				$saved=null;
				$validate=null;
			
			   if((in_array($line[0],$already_exist_sabhasad_no)) or (in_array($line[2],$already_exist_sabhasad_no))){
				
					$sabhasadno=null;
					if($line[0]==0){
						$sabhasadno=$line[2];
					}else{
						$sabhasadno=$line[0];
					}

					$saved="No";	
					$validate='Product already exist.';
				}else{
					$model1 = new Product;	
					$model1->product_type_id=$line[0];			
					$model1->potency_id=$line[3];	
					$model1->quantity_type_id=$line[17];						
					$model1->name=$line[5];		
					$model1->abbreviations=$line[15];			
					$model1->date_of_purchase=$line[9];			
					$model1->date_of_mfg=$line[11];	
					$model1->date_of_expiry=$line[14];			
					$model1->issue_date=$line[12];			
					$model1->total_in=$line[13];		
					$model1->total_out=$line[19];			
					$model1->balance=$line[7];			
					$model1->validate();
				
					if ($model1->save()) {							
						$product_id=$model1->id;						
						$name=$model1->name;						
						$abbreviations=$model1->abbreviations;						
						$date_of_purchase=$model1->date_of_purchase;						
						$date_of_mfg=$model1->date_of_mfg;						
						$date_of_expiry=$model1->date_of_expiry;						
						$issue_date=$model1->issue_date;						
						$total_in=$model1->total_in;						
						$total_out=$model1->total_out;						
						$balance=$model1->balance;	
						$saved="Yes";	
						$validate='Yes';							
					}
					else{	
						$saved="No";	
						$validate=$model1->getErrors();							
					} 
					
				}						

				$info[]["product_id"]=$product_id;
				$info[]["name"]=$name;
				$info[]["abbreviations"]=$abbreviations;
				$info[]["date_of_purchase"]=$date_of_purchase;	
				$info[]["date_of_mfg"]=$date_of_mfg;
				$info[]["date_of_expiry"]=$date_of_expiry;
				$info[]["issue_date"]=$issue_date;
				$info[]["total_in"]=$total_in;
				$info[]["total_out"]=$total_out;		
				$info[]["balance"]=$balance;		
				$info[]["saved"]="Yes";
				$info[]["validate"]='Yes';	
				$all[]=$info;	
			}

				$this->render('sucess', array(
								'model' => $model,
								'all' => $all,	
							));

					
			} 
			else{				
				Yii::$app->session->setFlash('error', 'You Can Upload Maximum 200 Accounts.');	
				return $this->render('uploadcsv', [
					'model' => $model,
				]);
			}
		*/
			Yii::$app->session->setFlash('success', "Congratulations your CSV uploaded successfully.");
			return $this->redirect(['/product']);
		}
		
        return $this->render('uploadcsv', [
            'model' => $model,
        ]);
	}


}
