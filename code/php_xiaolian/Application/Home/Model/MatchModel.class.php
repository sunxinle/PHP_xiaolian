<?php
/**
 * Created by PhpStorm.
 * User: 白照运
 * Date: 2016/12/8
 * Time: 8:53
 */

namespace Home\Model;


use Think\Model\RelationModel;

class MatchModel extends RelationModel
{
    protected $_link = array(
        'user' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'user',
            'foreign_key'  => 'fid',
            'as_fields'    => 'nickname,name,headimgurl,openid,wechatid,account'
        ),
        'to_uni' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'university',
            'foreign_key'  => 'tuniid'
        ),
        'from_uni' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'university',
            'foreign_key'  => 'funiid'
        )

    );
}