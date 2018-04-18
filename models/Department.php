<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%department}}".
 *
 * @property integer $depart_id
 * @property integer $fact_id
 * @property string $depart_name
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%department}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fact_id', 'depart_name','contact_email'], 'required'],
            [['fact_id'], 'integer'],
            [['depart_name','contact_email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'depart_id' => 'Depart ID',
            'fact_id' => 'Faculty',
            'depart_name' => 'Depart Name',
            'contact_email'=> 'Contact Email'
        ];
    }
     public function getFaculty(){

        return $this->hasOne(Faculty::className(),['fact_id'=>'fact_id']);
    }
     public function getStudent(){

        return $this->hasMany(Student::className(),['depart_id'=>'depart_id']);
    }
    public function getCourse(){

        return $this->hasMany(Course::classname(),['depart_id'=>'depart_id']);
    }
}
