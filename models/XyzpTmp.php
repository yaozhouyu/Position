<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xyzp_tmp".
 *
 * @property string $id
 * @property string $position 职位名称
 * @property string $info_id
 * @property string $company 涉及企业
 * @property string $class 所属大类
 * @property string $subclass 所属子类
 * @property int $op1
 * @property int $op2
 * @property int $op
 */
class XyzpTmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xyzp_tmp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'info_id', 'company', 'class', 'subclass'], 'required'],
            [['company', 'class', 'subclass'], 'string'],
            [['position', 'info_id'], 'string', 'max' => 255],
            [['op1', 'op2', 'op'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position' => 'Position',
            'info_id' => 'Info ID',
            'company' => 'Company',
            'class' => 'Class',
            'subclass' => 'Subclass',
            'op1' => 'Op1',
            'op2' => 'Op2',
            'op' => 'Op',
        ];
    }
}
