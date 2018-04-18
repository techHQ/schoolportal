<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Faculty;
use app\models\Department;
use yii\data\Pagination;

class FacultyController extends \yii\web\Controller
{
	 
 public function behaviors(){
    
           return [
              'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create'],
                'rules' =>[
                   [
                    'actions'=>['create'],
                    'allow'=>true,
                    'roles'=>['@'],
                   ],
                 ],
              ]
           ];
 }


   public function actionIndex(){
        //run a query;
	 	$query = Faculty::find();
        $pagination = new Pagination([
         'defaultPageSize'=>5,
         'totalCount'     =>$query->count(),
        ]);
        $faculties = $query->orderBy('faculty_name','fact_id')
          ->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all();

        return $this->render('index',
        [  'faculties'=> $faculties,
         'pagination'=> $pagination,
        ]);
    }

    public function actionCreate(){
         $faculty = new Faculty();

    if ($faculty->load(Yii::$app->request->post())) {
        if ($faculty->validate()) {
            //save
  			$faculty->save();
            //set flash
            yii::$app->getSession()->setFlash('success','Faculty Added');
            return $this->redirect('index.php?r=faculty');
        }
    }

    return $this->render('Create', [
        'faculty' => $faculty,
    ]);
    }

   

}
