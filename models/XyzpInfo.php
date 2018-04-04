<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xyzp_info".
 *
 * @property string $id
 * @property string $title
 * @property string $company
 * @property string $email
 * @property string $apply_email
 * @property string $apply_url
 * @property string $apply_type
 * @property string $catchtime
 * @property string $url
 * @property string $web
 * @property string $zone
 * @property int $functionid
 * @property int $univ_id
 * @property string $city
 * @property int $changetimes 当时间或地点更新时 自增1
 * @property string $clicks 点击次数
 * @property string $fake_clicks
 * @property int $is_deleted 是否被爬虫认为已删除 删除时不直接删掉信息 而是将该字段置1 若发现误删可直接置0 可防止爬虫误删后又重新获取到时id的更改
 * @property int $delete_type 删除类型 1为虚假 2为删除(人为删) 3为错误(机器删)
 * @property int $is_locked 是否管理员介入调整 lock后爬虫不会再修改其中信息 也不会删除该信息
 * @property int $lockadmin 锁管理员id
 * @property int $is_iframe 是否有iframe 即是否有原站模式 原网站要登录或来自广告信息等时就没有原站模式
 * @property int $is_official 是否是公司认证
 * @property string $company_id 公司认证时的公司id
 * @property int $brand_id
 * @property string $char_logo
 * @property int $isposition 是否是公司发布职位
 * @property string $position 职位名
 * @property string $positionid 职位id
 * @property int $issxxx 是否是实习信息
 * @property string $sxxxid 实习信息id
 * @property int $is_sxxx
 * @property int $link_id
 * @property int $link_count
 * @property string $create_time
 * @property string $update_time
 * @property string $active_time
 * @property string $expire_time
 * @property string $publish_date
 * @property int $grade
 */
class XyzpInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xyzp_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catchtime', 'functionid', 'univ_id', 'fake_clicks', 'is_sxxx', 'link_id', 'link_count', 'create_time', 'update_time', 'active_time'], 'required'],
            [['catchtime', 'create_time', 'update_time', 'active_time', 'expire_time', 'publish_date'], 'safe'],
            [['functionid', 'univ_id', 'changetimes', 'clicks', 'fake_clicks', 'delete_type', 'lockadmin', 'company_id', 'brand_id', 'positionid', 'sxxxid', 'is_sxxx', 'link_id', 'link_count', 'grade'], 'integer'],
            [['title', 'company', 'web', 'city'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 500],
            [['apply_email', 'apply_url'], 'string', 'max' => 200],
            [['apply_type', 'char_logo'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 600],
            [['zone'], 'string', 'max' => 10],
            [['is_deleted', 'is_locked', 'is_iframe', 'is_official', 'isposition', 'issxxx'], 'string', 'max' => 1],
            [['position'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'company' => 'Company',
            'email' => 'Email',
            'apply_email' => 'Apply Email',
            'apply_url' => 'Apply Url',
            'apply_type' => 'Apply Type',
            'catchtime' => 'Catchtime',
            'url' => 'Url',
            'web' => 'Web',
            'zone' => 'Zone',
            'functionid' => 'Functionid',
            'univ_id' => 'Univ ID',
            'city' => 'City',
            'changetimes' => 'Changetimes',
            'clicks' => 'Clicks',
            'fake_clicks' => 'Fake Clicks',
            'is_deleted' => 'Is Deleted',
            'delete_type' => 'Delete Type',
            'is_locked' => 'Is Locked',
            'lockadmin' => 'Lockadmin',
            'is_iframe' => 'Is Iframe',
            'is_official' => 'Is Official',
            'company_id' => 'Company ID',
            'brand_id' => 'Brand ID',
            'char_logo' => 'Char Logo',
            'isposition' => 'Isposition',
            'position' => 'Position',
            'positionid' => 'Positionid',
            'issxxx' => 'Issxxx',
            'sxxxid' => 'Sxxxid',
            'is_sxxx' => 'Is Sxxx',
            'link_id' => 'Link ID',
            'link_count' => 'Link Count',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'active_time' => 'Active Time',
            'expire_time' => 'Expire Time',
            'publish_date' => 'Publish Date',
            'grade' => 'Grade',
        ];
    }
}
