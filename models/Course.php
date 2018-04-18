<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course}}".
 *
 * @property integer $course_id
 * @property integer $depart_id
 * @property integer $user_id
 * @property string $course_name
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['depart_id', 'course_name'], 'required'],
            [['depart_id'], 'integer'],
            [['course_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'course_id' => 'Course ID',
            'depart_id' => 'Departments',
            'user_id' => 'User ID',
            'course_name' => 'Course Name',
        ];
    }
    public function getDepartment(){

        return $this->hasOne(Department::className(),['depart_id'=>'depart_id']);
    }
     public function getStudent(){

        return $this->hasMany(Student::className(),['course_id'=>'course_id']);
    }
     
}
