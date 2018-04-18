<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form ActiveForm */
?>
<div class="student-edit">
<h2 class="page-header">Edit/Approve Student</h2>
    <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($student, 'firstname') ?>
        <?= $form->field($student, 'middlename') ?>
        <?= $form->field($student, 'lastname') ?>
        <?= $form->field($student, 'fact_id') ?>
        <?= $form->field($student, 'depart_id') ?>
        <?= $form->field($student, 'course_id') ?>
        <?= $form->field($student, 'email') ?>
        <?= $form->field($student, 'phonenumber') ?>
        <?= $form->field($student, 'password') ?>
        <?= $form->field($student, 'username') ?>
        
        <?= $form->field($student, 'status')->dropDownList(['Unapproved'=>'Unapproved','Approved'=>'Approved','pending'=>'Suspend']); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- student-edit -->
