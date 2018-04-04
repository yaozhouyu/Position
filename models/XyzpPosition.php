<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xyzp_position".
 *
 * @property string $id
 * @property string $name
 * @property string $resume
 * @property string $city
 * @property int $info_id
 * @property int $company_id
 * @property string $create_time
 * @property string $update_time
 * @property int $sort
 * @property int $is_deleted
 * @property int $content_offset
 */
class XyzpPosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xyzp_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'city', 'info_id', 'create_time', 'update_time', 'sort', 'is_deleted', 'content_offset'], 'required'],
            [['info_id', 'company_id', 'content_offset'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['resume'], 'string', 'max' => 200],
            [['city'], 'string', 'max' => 100],
            [['sort'], 'string', 'max' => 4],
            [['is_deleted'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'resume' => 'Resume',
            'city' => 'City',
            'info_id' => 'Info ID',
            'company_id' => 'Company ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'sort' => 'Sort',
            'is_deleted' => 'Is Deleted',
            'content_offset' => 'Content Offset',
        ];
    }

    public function getInfos()
    {
        return $this->hasOne(XyzpInfo::className(),['id'=>'info_id']);
    }
}
