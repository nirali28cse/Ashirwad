<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

class SiteController extends Controller
{
	
	 public $enableCsrfValidation = false;
	 public $layout = 'ashirvad';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

	public function actionProduct() {
		$products = [];
		if (isset($_POST['depdrop_all_params'])) {
			$parents = $_POST['depdrop_all_params'];

			if ($parents != null) {
				$product_type_id = 0;
				$potency_id = 0;
				$quantity_type_id = 0;
				$product_type_id = $parents['product_type_id'];
				$potency_id = $parents['potency_id'];
				$quantity_type_id = $parents['quantity_type_id'];
				// $out = self::getSubCatList($cat_id); 
				// the getSubCatList function will query the database based on the
				// cat_id and return an array like below:
				// [
				//    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
				//    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
				// ]

				
				$products=Product::find()
						->where(['product_type_id' =>$product_type_id])
						->andWhere(['potency_id' =>$potency_id])
						->andWhere(['quantity_type_id' =>$quantity_type_id])
						->orderBy('id')
						->asArray()
						->all();

				$selected  = null;
				$out  = null;
				if ($products != null && count($products) > 0) {
					$selected = '';
					foreach($products as $i => $product) {
						$out[] = ['id' => $product['id'], 'name' => $product['name']];
						if ($i == 0) {
							$selected = $product['id'];
						}
					}
					// Shows how you can preselect a value
					echo Json::encode(['output' => $out, 'selected'=>$selected]);
					return;
				}

			}
		}
		echo Json::encode(['output'=>$products, 'selected'=>'']);
	}
 
    /**
     * Login action.
     *
     * @return Response|string
     */
	

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionEvents()
    {
        return $this->render('events');
    }  
	public function actionPortfolio()
    {
        return $this->render('portfolio');
    } 
	public function actionAbout()
    {
        return $this->render('about');
    }

}
