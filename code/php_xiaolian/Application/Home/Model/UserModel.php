<?php
/**
 * Created by PhpStorm.
 * User: 家牧
 * Date: 2016/12/7
 * Time: 10:52
 */

namespace Home\Model;
use Think\Model\RelationModel;

class UserModel extends RelationModel
{
    protected $tablePrefix = 'xl_';
    protected $_link = array(
        'University' => array(//表名 首字母大写
            'mapping_type' => self::BELONGS_TO,
            'mapping_class'=>'University',//表名
            'foreign_key'=>'uniid',
        ));
}