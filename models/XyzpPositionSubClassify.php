<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xyzp_position_sub_classify".
 *
 * @property int $id
 * @property int $info_id
 * @property int $class
 * @property string $create_time
 */
class XyzpPositionSubClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xyzp_position_sub_classify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info_id', 'class', 'create_time'], 'required'],
            [['info_id', 'class'], 'integer'],
            [['create_time'], 'safe'],
            [['info_id', 'class'], 'unique', 'targetAttribute' => ['info_id', 'class']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info_id' => 'Info ID',
            'class' => 'Class',
            'create_time' => 'Create Time',
        ];
    }
}
