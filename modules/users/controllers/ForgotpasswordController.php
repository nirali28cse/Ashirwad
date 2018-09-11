<?php


namespace app\modules\users\controllers;

use Yii;
use app\modules\users\models\Users;
use app\modules\users\models\Changepassword;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * ForgetpasswordController implements the CRUD actions for Userdetail model.
 */
class ForgotpasswordController extends Controller
{

    public $layout = '/ashirvad';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                //    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Userdetail models.
     * @return mixed
     */
	 
	
/*     public function actionIndex()
    {   

	    $model = new Users();
		if (Yii::$app->request->post()){
			$username=$_POST['Users']['username'];

		}
		
        return $this->render('index', [
            'model' => $model,
        ]);
	} */
	
    public function actionChangepass()
    {
		$model = new Changepassword();
        if(count($model)>0){
			if (Yii::$app->request->post()){
				$new_password=$_POST['Changepassword']['new_password'];
				$reenter_password=$_POST['Changepassword']['reenter_password'];
				if(($new_password==$reenter_password) and ($new_password!=null) and ($reenter_password!=null)){	
					$id=Yii::$app->user->id;
					$model1=Users::findOne($id);
					$model1->password=md5($new_password);
					$model1->save();
					Yii::$app->session->setFlash('success', "Password Rest Successfully.");
					return $this->redirect(['/site']);
				}	
			}
		}		
		return $this->render('changepass', [
			'model' => $model,
		]);
	}

}
