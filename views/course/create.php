<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use app\models\Department;
use yii\Helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $course app\models\Course */
/* @var $form ActiveForm */
?>
<div class="course-create">
<h2 class="page-header">Add Courses</h2>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($course, 'depart_id') 
      ->dropDownList(ArrayHelper::map(Department::find()->orderBy('depart_name')->all(),'depart_id','depart_name'),['prompt'=>'Select Department'


        ]);
        ?>
        
        <?= $form->field($course, 'course_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- course-create -->
