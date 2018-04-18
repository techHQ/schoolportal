<?php

namespace app\controllers;
use yii;
use app\models\Coursereg;

class CourseregController extends \yii\web\Controller
{
    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionEdit()
    {
        return $this->render('edit');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

   public function actionRegister()
{
    $coursereg = new Coursereg();

    if ($coursereg->load(Yii::$app->request->post())) {
        if ($coursereg->validate()) {
            // save
            $coursereg->save();
            return $this->redirect('index.php?r=coursereg');
        }
    }

    return $this->render('register', [
        'coursereg' => $coursereg,
    ]);
}





}
