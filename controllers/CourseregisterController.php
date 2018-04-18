<?php

namespace app\controllers;

use yii;
use app\models\Courseregister;
use app\models\Student;
use app\models\Faculty;
use app\models\Department;

class CourseregisterController extends \yii\web\Controller
{
    public function actionCreate()
{
    $courseregister = new Courseregister();

    if ($courseregister->load(Yii::$app->request->post())) {
        if ($courseregister->validate()) {
            // save
            $courseregister->save();
          
        }
    }

    return $this->render('create', [
        'courseregister' => $courseregister,
    ]);
}



    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
     public function actionLists($id){
     
       $countDepartment = Department::find()
                        ->where(['fact_id'=>$id])
                        ->count(); 

       $departments = Department::find()
                        ->where(['fact_id'=>$id])
                        ->all();

      if($countDepartment > 0){

        foreach($departments as $department){

          echo"<option value='".$department->depart_id."'>".$department->depart_name."</option>";
    
        }

         

        }else{
         echo "<option>-</option>";

      }

    }

}
