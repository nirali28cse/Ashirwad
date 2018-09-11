<?php

namespace app\modules\users\controllers;

use Yii;
use app\modules\users\models\Users;
use app\modules\users\models\LoginForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistrationController implements the CRUD actions for Userdetail model.
 */
class LoginController extends Controller
{

    public $enableCsrfValidation = false;
	public $layout = '/ashirvad';
	
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                //    'idealusertimeout' => ['post'],
                ],
            ],
        ];
    }
	
    public function actions()
    {
        return [
			'auth' => [
			  'class' => 'yii\authclient\AuthAction',
			  'successCallback' => [$this, 'oAuthSuccess'],
			],
        ];
    }
	 
    public function actionIndex()
    {
        $model = new LoginForm();

		if ($model->load(Yii::$app->request->post()) && $model->login()) {
           return $this->redirect(['/users/default/dashbord']);
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }

    }   

	 public function actionLogout()
    {
		if (!Yii::$app->user->isGuest) {		
			Yii::$app->user->logout();
			return $this->goHome();
		}
    }


	
}
