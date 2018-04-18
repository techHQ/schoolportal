<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Faculty;
use app\models\Department;
use app\models\Course;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="user-register">
  
  <h2 class="page-header">Registration Form</h2>



    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'firstname') ?>
        <?= $form->field($model, 'middlename') ?>
        <?= $form->field($model, 'lastname') ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'phonenumber') ?>
        <?= $form->field($model, 'password') ?>

        <?= $form->field($model, 'faculty_id')

        ->dropDownList(Faculty::find()
        ->select(['faculty_name','fact_id'])
        ->indexBy('fact_id')
        ->column(),['prompt'=>'Select Faculty']
         );




         ?>
        <?= $form->field($model, 'depart_id') 

         ->dropDownList(Department::find()
        ->select(['depart_name','depart_id'])
        ->indexBy('depart_id')
        ->column(),['prompt'=>'Select Department']
         );



        ?>
        <?= $form->field($model, 'course_id') 

        ->dropDownList(Course::find()
        ->select(['course_name','course_id'])
        ->indexBy('course_id')
        ->column(),['prompt'=>'Select Course']
         );



        ?>
        
       
        <?= $form->field($model, 'auth_key') ?>
       
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
