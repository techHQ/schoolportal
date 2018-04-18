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

class DepartmentController extends \yii\web\Controller
{    
     
   public function behaviors(){
    
           return [
              'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create','edit','delete'],
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
        // run a query;
        
        $query = Department::find();
        $pagination = new Pagination([
         'defaultPageSize'=>5,
         'totalCount'     =>$query->count(),
        ]);
        $departments = $query->orderBy('depart_name','depart_id')
          ->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all();
         
    
        return $this->render('index',
        [ 'departments'=> $departments,
         'pagination'=> $pagination,
        ]);
    }
     public function actionDashboard($id){
         //run a query;S
        
        $query = Department::find();
        $pagination = new Pagination([
         'defaultPageSize'=>5,
         'totalCount'     =>$query->count(),
        ]);
        $departments = $query->orderBy('depart_name','depart_id')
          ->offset($pagination->offset)
          ->limit($pagination->limit)
          ->where(['depart_id' => $id])
          ->all();
    
        return $this->render('dashboard',
        [ 'departments'=> $departments,
         'pagination'=> $pagination,
        ]);

    }
    public function actionDetails($id){
        $department = Department::find()
        ->where(['depart_id' => $id])
        ->One();
        return $this->render('details',['department'=>$department]);
    }

    public function actionCreate()
    {
         $department = new Department();

    if ($department->load(Yii::$app->request->post())) {
        if ($department->validate()) {
            //save
            $department->save();
            //set flash
            yii::$app->getSession()->setFlash('success','Department Added');
            return $this->redirect('index.php?r=department');
        }
    }

    return $this->render('create', [
        'department' => $department,
    ]);
    }

    public function actionDelete($id)
    {
        $department = Department::findOne($id);
            //delete
            $department->delete();
            yii::$app->getSession()->setFlash('success','Department Deleted');
            //redirect

            return $this->redirect('index.php?r=department');
    }

    public function actionEdit($id)
    {    
         $department =Department::findOne($id);

    if ($department->load(Yii::$app->request->post())) {
        if ($department->validate()) {
            //save
            $department->save();
            return $this->redirect('index.php?r=department');
        }
    }

    return $this->render('edit', [
        'department' => $department,
    ]);
    }

    public function actionLists($id){
        // $departments = Department::find()->where(['fact_id'=>$id])->all();

        // if($departments > 0){
        //   foreach ($departments as $department) {
        //     echo "<option value='".$department->deptart_id."'>".$department->depart_name."</option>";
        //   }
        // }

       $countDepartment = Department::find()
                        ->where(['fact_id'=>$id])
                        ->count(); 


       $departments = Department::find()
                        ->where(['fact_id'=>$id])
                        ->all();

      if($countDepartment > 0){

        // $save="";
        // $save.="<option>Select a department...</option>";
        foreach($departments as $department){

          // $save.= "<option value='".$department->depart_id."'>".$department->depart_name."</option>";
          //  $save;
          echo "<option value='".$department->depart_id."'>".$department->depart_name."</option>";
        }

         

        }else{
         echo "<option>-</option>";

      }

    }

}
