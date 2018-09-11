<?php

namespace app\modules\users\controllers;

use yii\web\Controller;
use app\modules\users\models\Users;
use app\modules\users\models\UsersSearch;

/**
 * Default controller for the `users` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionDashbord()
    {
        return $this->render('dashbord');
    }
}
