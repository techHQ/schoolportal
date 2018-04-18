<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Faculty;
use yii\Helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $department app\models\Department */
/* @var $form ActiveForm */
?>
<div class="department-edit">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($department, 'fact_id')
        ->dropDownList(Faculty::find()
        ->select(['faculty_name','fact_id'])
        ->indexBy('fact_id')
        ->column(),['prompt'=>'Select Faculty']
         ); ?>

        <?= $form->field($department, 'depart_name') ?>
        <?= $form->field($department, 'contact_email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- department-edit -->
