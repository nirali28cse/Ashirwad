<?php


namespace app\modules\users\controllers;

use Yii;
use app\modules\users\models\Users;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistrationController implements the CRUD actions for Userdetail model.
 */
class RegistrationController extends Controller
{

    public $layout = '/ashirvad';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
	
    /**
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Users();
        if ($model->load(Yii::$app->request->post())) {
			$model->password=md5($_POST['Users']['password']);

			if($model->save()){
				if (Yii::$app->user->login($model, 0) ) {
					return $this->redirect(['/users/default/dashbord']);
				}	
			}
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    } 
	
	public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
}
