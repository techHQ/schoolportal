<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Department;
use app\models\Faculty;
use app\models\Course;

/* @var $this yii\web\View */
/* @var $coursereg app\models\Coursereg */
/* @var $form ActiveForm */
?>
<div class="coursereg-register">
<h2 class="page-header">Course Registration</h2>
    <?php $form = ActiveForm::begin(); ?>
        
        <?= $form->field($coursereg, 'firstname') ?>
        <?= $form->field($coursereg, 'lastname') ?>
        <?= $form->field($coursereg, 'fact_id') 

         
        ->dropDownList(Faculty::find()
        ->select(['faculty_name','fact_id'])
        ->indexBy('fact_id')
        ->column(),['prompt'=>'Select Faculty', 'onchange'=>'getDeps()'


    ]);


        ?>

        <?= $form->field($coursereg, 'depart_id') 
        

        ->dropDownList(Department::find()
        ->select(['depart_name','depart_id'])
        ->indexBy('depart_id')
        ->column(),['prompt'=>'Select Department']
         );
        ?>

        <?= $form->field($coursereg, 'course_id')



        ->dropDownList(Course::find()
        ->select(['course_name','course_id'])
        ->indexBy('course_id')
        ->column(),['prompt'=>'Select Courses']
         );

    
      ?>

        <?= $form->field($coursereg, 'coursecode') ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- coursereg-register -->
<script>
function getDeps(){
    console.debug($(this).find('#coursereg-fact_id').attr('value'));
     $.post("<?=yii::$app->urlManager->createUrl('department/list-department?id=')?>"+$(this).find('#coursereg-fact_id').val(),
     function(data){
         console.debug(data);
         $("#coursereg-faculty_name").html(data);
     });  
}
</script>