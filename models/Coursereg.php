<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coursereg".
 *
 * @property integer $coursreg_id
 * @property integer $fact_id
 * @property integer $depart_id
 * @property integer $course_id
 * @property string $coursecode
 * @property string $firstname
 * @property string $lastname
 */
class Coursereg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coursereg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fact_id', 'depart_id', 'course_id', 'coursecode', 'firstname', 'lastname'], 'required'],
            [['fact_id', 'depart_id', 'course_id'], 'integer'],
            [['coursecode', 'firstname', 'lastname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'coursreg_id' => 'Coursreg ID',
            'fact_id' => 'Faculty Name',
            'depart_id' => 'Department name',
            'course_id' => 'Course Name',
            'coursecode' => 'Course Code',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
        ];
    }
       public function getFaculty(){

        return $this->hasOne(Faculty::className(),['fact_id'=>'fact_id']);
    }
     
       public function getDepartment(){

        return $this->hasOne(Faculty::className(),['depart_id'=>'depart_id']);
    }
     public function getCourse(){

        return $this->hasMany(Course::className(),['course_id'=>'course_id']);
    }
}
