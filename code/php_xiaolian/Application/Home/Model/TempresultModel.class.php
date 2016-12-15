<?php
/**
 * Created by PhpStorm.
 * User: 白照运
 * Date: 2016/12/10
 * Time: 18:02
 */

namespace Home\Model;


use Think\Model\RelationModel;

class TempresultModel extends RelationModel
{
    protected $_link = array(
        'match' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'match',
            'foreign_key'  => 'mid',
            'as_fields'    => 'fid,funiid,tuniid'
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
        ),
        'user' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'user',
            'foreign_key'  => 'fid',
            'as_fields'    => 'nickname,headimgurl'
        ),
        'confirm_user' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name'   => 'user',
            'foreign_key'  => 'id',
        )
    );
}