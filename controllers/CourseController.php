<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use app\models\Faculty;
use app\models\Department;
use app\models\Course;


class CourseController extends \yii\web\Controller
{
    public function behaviors(){
    
           return [
              'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create','delete','edit'],
                'rules' =>[
                   [
                    'actions'=>['create','delete','edit'],
                    'allow'=>true,
                    'roles'=>['@'],
                   ],
                 ],
              ]
           ];
 }






     public function actionIndex(){
         //run a query;
        $query = Course::find();
        $pagination = new Pagination([
         'defaultPageSize'=>5,
         'totalCount'     =>$query->count(),
        ]);
        $courses = $query->orderBy('course_name','depart_id')
          ->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all();

        return $this->render('index',
        [ 'courses'=> $courses,
         'pagination'=> $pagination,
        ]);
    }
     public function actionDetails($id){
        $course = Course::find()
        ->where(['course_id' => $id])
        ->One();
        return $this->render('details',['course'=>$course]);
    }

    public function actionCreate()
    {
        $course = new Course();

    if ($course->load(Yii::$app->request->post())) {
        if ($course->validate()) {
            // save
            $course->save();
            //set flash
            yii::$app->getSession()->setFlash('success','Course  Added');
            return $this->redirect('index.php?r=course');
        }
    }

    return $this->render('create', [
        'course' => $course,
    ]);
    }

    public function actionDelete()
    {
        $course = Course::findOne($id);
         //delete
         $course->delete();
         yii::$app->getSession()->setFlash('success','Course Deleted');
         //redirect

         return $this->redirect('index.php?r=course');
    }

    public function actionEdit($id)
    {
        $course =Course::findOne($id);

    if ($course->load(Yii::$app->request->post())) {
        if ($course->validate()) {
            // save
           $course->save();
            return $this->redirect('index.php?r=course');
        }
    }

    return $this->render('edit', [
        'course' => $course,
    ]);
    }
     public function actionLists($id){
        // $departments = Department::find()->where(['fact_id'=>$id])->all();

        // if($departments > 0){
        //   foreach ($departments as $department) {
        //     echo "<option value='".$department->deptart_id."'>".$department->depart_name."</option>";
        //   }
        // }

       $countCourses = Course::find()
                        ->where(['depart_id'=>$id])
                        ->count(); 


        $courses = Course::find()
                         ->where(['depart_id'=>$id])
                        ->all();
   

   if($countCourses > 0){
        foreach($courses as $course){

          echo"<option value='".$course->course_id."'>".$course->course_name."</option>";
    
        }

        }else{
         echo "<option> - </option>";

      }

    }
     

}

 