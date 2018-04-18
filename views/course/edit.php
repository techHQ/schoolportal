<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use yii\Helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $courseapp\models\Course */
/* @var $form ActiveForm */
?>
<div class="course-edit">
<h2 class="page-header">Update Course</h2>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($course, 'depart_id')
           ->dropDownList(Course::find()
        ->select(['course_name','course_id'])
        ->indexBy('course_id')
        ->column(),['prompt'=>'Select Course']
         );

         ?>
        <?= $form->field($course, 'course_name') ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- course-edit -->
