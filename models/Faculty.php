<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%faculty}}".
 *
 * @property integer $fact_id
 * @property string $faculty_name
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%faculty}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['faculty_name'], 'required'],
            [['faculty_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fact_id' => 'Fact ID',
            'faculty_name' => 'Faculty Name',
        ];
    }
      public function getDepartment(){

        return $this->hasMany(Department::className(),['fact_id'=>'fact_id']);
    }
    public function getStudent(){

        return $this->hasMany(Student::className(),['fact_id'=>'fact_id']);
    }
    
}
