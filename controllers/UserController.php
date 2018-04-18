<?php

namespace app\controllers;

use yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Faculty;
use app\models\Department;
use app\models\Course;
use app\models\User;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\db\ActiveRecord;
use app\data\ArrayDataProvider;
use app\data\ActiveDataProvider;

class UserController extends \yii\web\Controller
{
    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

   public function actionLogin(){
    
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new  User();

     
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
    

    return $this->render('login', [
        'model' => $model,
    ]);
}

  
    public function actionRegister(){
    $model = new User();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('register', [
        'model' => $model,
    ]);
}

public function actionDash(){
       


       $users = User::find()
                ->where(['user_id'=>1])
                ->all();
        return $this->render('dash',
        [ 'users'=> $userss,
         //'pagination'=> $pagination,
        ]);
      //   $users = yii::$app->db->createCommand('SELECT * from  {{user}} ');
      //   $provider = new ArrayDataProvider([

      //    'allModels' => $users ->queryAll(),


      //   ]);
       
      //  return $this->render('dash',
      // [ 'dataProvider'=> $provider,
      //  ]);
    }


}
