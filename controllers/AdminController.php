<?php

namespace app\controllers;
use yii;
use app\models\Student;
use app\models\Department;
use app\models\Faculty;
use app\models\Course;
use app\models\Admin;
use yii\filters\AccessControl;

class AdminController extends \yii\web\Controller
{
    public function behaviors(){
    
           return [
              'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['index'],
                'rules' =>[
                   [
                    'actions'=>['index'],
                    'allow'=>true,
                    'roles'=>['@'],
                   ],
                 ],
              ]
           ];
 }



    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex(){

    $student = Student::find()->all();

    $countStudent = Student::find()->count();
    $countDepartment = Department::find()->count();
    $countFaculty = Faculty::find()->count();
    $countCourse = Course::find()->count();
      // form inputs are valid, do something here
      // return   $this->render('all');
    return $this->render('index', [
        'student' => $student,
        'countStudent' => $countStudent,
        'countFaculty' => $countFaculty,
        'countDepartment' => $countDepartment,
        'countCourse' => $countCourse,
    ]);
    }


    public function actionUpdate()
    {
        return $this->render('update');
    }

    

}
