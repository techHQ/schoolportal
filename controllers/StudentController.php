<?php

namespace app\controllers;

use yii;
use app\models\Student;
use app\models\Course;
use app\models\Faculty;
use app\models\Department;
use yii\web\UploadedFile;

class StudentController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

  public function actionRegister()
{
    $student = new Student();

 if ($student->load(Yii::$app->request->post())) {
          
        if ($student->validate()) {
            // save
            $student->save();
            //uploading image file to the database
            $student_id = $student->student_id;
            $student_image = UploadedFile::getInstance($student , 'student_image');
            $imgName = 'stu_'.$student_id.'.'.$student_image->getExtension();
            $student_image->saveas(yii::getAlias('@studentImgPath'). '/'. $imgName);
            $student->student_image = $imgName;
            // $aa= $student->Student['course_id'];
            // $ab="";
            // for($i =0;$i<count($aa);$i++){
            //     $ab.= $aa[$i];
            // }
            // $student->Student['course_id']= $ab;
            $student->save();


            
            //set flash
            yii::$app->getSession()->setFlash('success','Student Added');
            return $this->redirect('index.php?r=student/index');
        }
    }

    return $this->render('register', [
        'student' => $student,
       
    ]);
}

public function actionDetails($id){

    $student = Student::find()
               ->where(['student_id'=>$id])
               ->one();


     return $this->render('details', [
        'student' => $student,
    ]);

    }

    public function actionEdit($id){
    
       $student = Student::findOne($id);

    if ($student->load(Yii::$app->request->post())) {
        if ($student->validate()) {
            // form inputs are valid, do something here
            $student->save();

             //set flash
            yii::$app->getSession()->setFlash('success','Student Added');
            return $this->redirect('index.php?r=student/all');
            
        }
    }

    return $this->render('edit', [
        'student' => $student,
    ]);
}



 public function actionAll(){
    $student = Student::find()->all();

    $faculty = Faculty::find()->all();
    $department = Department::find()->all();
    $course = Course::find()->all();
   
    
        
      // form inputs are valid, do something here
      // return   $this->render('all');
    return $this->render('all', [
        'student' => $student,
        'faculty' => $faculty,
        'department' => $department,
        'course' => $course,
    ]);



}








}
