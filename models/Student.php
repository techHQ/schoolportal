<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $student_id
 * @property integer $faculty_id
 * @property integer $depart_id
 * @property integer $course_id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $email
 * @property string $phonenumber
 * @property string $password
 * @property string $auth_key
 * @property string $username
 * @property string $created_at
 */
class Student extends \yii\db\ActiveRecord
{
   public $password_repeat;
   

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fact_id', 'depart_id',  'firstname', 'middlename', 'lastname', 'email', 'phonenumber', 'password', 'username'], 'required'],
            [['fact_id', 'depart_id'], 'integer'],
            [['created_at','course_id','status'], 'safe'],
            [['firstname', 'middlename', 'lastname', 'email', 'phonenumber', 'password', 'auth_key', 'username' ], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'student_id' => 'Student ID',
            'fact_id' => 'Faculty ',
            'depart_id' => 'Department',
            'course_id' => 'Courses',
            'firstname' => 'Firstname',
            'middlename' => 'Middlename',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'phonenumber' => 'Contact Number',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'username' => 'Username',
            'created_at' => 'Created At',
            'password_repeat' => 'Confirm Password',
            'status'=>'status',
        ];
    }
      public function getDepartment(){

        return $this->hasOne(Department::className(),['depart_id'=>'depart_id']);
    }
     public function getFaculty(){

        return $this->hasOne(Faculty::className(),['fact_id'=>'fact_id']);
    }
     public function getCourse(){

        return $this->hasOne(Course::className(),['course_id'=>'course_id']);
    }







    public function beforeSave($insert){
        
        if(Parent::beforeSave($insert)){

            if(isset($this->Student['course_id'])){
            
            
               json_encode($this->Student['course_id'][]) ;
                return Parent::beforeSave($insert);
              
            }

        }
       return true;
    }
}
