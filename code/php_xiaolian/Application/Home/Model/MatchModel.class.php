<?php
/**
 * Created by PhpStorm.
 * User: sunxinle
 * Date: 2016/12/7
 * Time: 9:39
 */

namespace Home\Model;
use Think\Model\RelationModel;
class MatchModel extends RelationModel
{
    protected $tablePrefix = 'xl_';
    protected $_auto = array (
        array('tag','0'),  // 新增的时候把tagone字段设置为0
        array('msendtime','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
        );
    protected $_link = array(
        'University' => array(//表名 首字母大写
            'mapping_type' => self::MANY_TO_MANY,
            'mapping_class'=>'University',//表名
            'foreign_key'=>'uniid',
        )
    );
}