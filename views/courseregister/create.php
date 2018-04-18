<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Course;
use app\models\Student;
use app\models\Faculty;
use app\models\Department;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Courseregister */
/* @var $form ActiveForm */
?>
<div class="courseregister-create">

    <?php $form = ActiveForm::begin(); ?>

           <?= $form->field($courseregister, 'student_id')?>
             
          <?= $form->field($courseregister, 'fact_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy('Faculty_name')->all(),'fact_id','faculty_name') ,['prompt'=>'Select Faculty',
        'onchange'=>'$.post("index.php?r=department/lists&id='.'"+$(this).val(),function(data){
            $("select#student-depart_id").html(data);
            });

        console.log("it changed");
        console.log($(this).val());
        console.log(data);
        ']);
      ?>
  
       

    <?= $form->field($courseregister, 'depart_id')->dropDownList(ArrayHelper::map(Department::find()->orderBy('depart_name'),'depart_id','depart_name') ,['prompt'=>'Select Department',
        'onchange'=>'$.post("index.php?r=course/lists&id='.'"+$(this).val(),function(data){
            $("select#student-course_id").html(data);
            });

        console.log("it changed");
        console.log($(this).val());
        console.log(data);
        ']);
      ?>
      

         <?= $form->field($courseregister, 'course_id')->dropDownList(ArrayHelper::map(Course::find()->orderBy('course_name'),'course_id','course_name') ,['multiple'=>'multiple','prompt'=>'Select Courses',
                'onchange'=>'
            console.log($(this).val());
            });'
     ]);
      ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- courseregister-create -->
