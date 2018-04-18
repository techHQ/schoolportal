<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $faculty app\models\Faculty */
/* @var $form ActiveForm */
?>
<div class="Faculty-Create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($faculty, 'faculty_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- Faculty-Create -->
