<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Faculty;
use app\models\Department;
use app\models\Course;
use yii\helpers\ArrayHelper;
use app\models\Student;
use kartik\select2\select2;

/* @var $this yii\web\View */
/* @var $student app\models\Student */
/* @var $form ActiveForm */
?>
<div class="student-register">
  <h2 class="page-header">Course Registration</h2>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

        <?= $form->field($student, 'firstname') ?>
        <?= $form->field($student, 'middlename') ?>
        <?= $form->field($student, 'lastname') ?>
        <?= $form->field($student, 'username') ?>
        <?= $form->field($student, 'student_image')->fileInput() ?>
        <?= $form->field($student, 'password')->passwordInput() ?>
        <?= $form->field($student, 'password_repeat')->passwordInput() ?>
        
       
              
          <?= $form->field($student, 'fact_id')->dropDownList(ArrayHelper::map(Faculty::find()->orderBy('Faculty_name')->all(),'fact_id','faculty_name') ,['prompt'=>'Select Faculty',
        'onchange'=>'$.post("index.php?r=department/lists&id='.'"+$(this).val(),function(data){
            $("select#student-depart_id").html(data);
            });

        console.log("it changed");
        console.log($(this).val());
        console.log(data);
        ']);
      ?>
  
       

    <?= $form->field($student, 'depart_id')->dropDownList(ArrayHelper::map(Department::find()->orderBy('depart_name'),'depart_id','depart_name') ,['prompt'=>'Select Department',
        'onchange'=>'$.post("index.php?r=course/lists&id='.'"+$(this).val(),function(data){
            $("select#student-course_id").html(data);
            });

        console.log("it changed");
        console.log($(this).val());
        console.log(data);
        ']);
      ?>
      

         <?= $form->field($student, 'course_id')->dropDownList(ArrayHelper::map(Course::find()->orderBy('course_name'),'course_id','course_name') ,['multiple'=>'multiple','prompt'=>'Select Courses'
            
           
     ]);
      ?>
        
       
        <?= $form->field($student, 'email') ?>
        <?= $form->field($student, 'phonenumber') ?>
       
        

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
    <button onClick="alert()">Get value</button>
</div><!-- student-register -->

<script type="text/javascript">

function alert(){
    console.log('working')
   var value= document.getElementById('student-course_id');
   var ivalue=value;
   for(var i=0;i<ivalue.length;i++){
    console.log(ivalue[i]);
   }
  
}

</script>