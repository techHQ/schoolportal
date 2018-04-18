<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courseregister".
 *
 * @property integer $id
 * @property integer $course_id
 * @property integer $student_id
 */
class Courseregister extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'courseregister';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'student_id'], 'required'],
            [['course_id', 'student_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'student_id' => 'Student ID',
        ];
    }
    public function getStudent(){

        return $this->hasMany(Student::className(),['depart_id'=>'depart_id']);
    }
}
