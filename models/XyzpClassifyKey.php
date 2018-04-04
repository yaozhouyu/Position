<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xyzp_classify_key".
 *
 * @property string $id
 * @property string $key
 * @property int $p_id
 * @property int $is_deleted
 * @property int $order
 */
class XyzpClassifyKey extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xyzp_classify_key';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['p_id', 'order'], 'integer'],
            [['key'], 'string', 'max' => 50],
            [['is_deleted'], 'string', 'max' => 1],
            [['key', 'p_id'], 'unique', 'targetAttribute' => ['key', 'p_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'p_id' => 'P ID',
            'is_deleted' => 'Is Deleted',
            'order' => 'Order',
        ];
    }
}
