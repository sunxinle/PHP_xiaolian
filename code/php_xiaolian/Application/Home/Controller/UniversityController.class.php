<?php
/**
 * Created by PhpStorm.
 * User: 白照运
 * Date: 2016/11/28
 * Time: 15:25
 */

namespace Home\Controller;


use Think\Controller;

class UniversityController extends Controller
{
   public function detail()
   {
   	 $id=I('get.id');
   	 $model=M('university');
     $data=$model->where("uniid=%d",$id)->find();
     $this->assign("unidata",$data);
     $this->display();
   }
   public function index()
   {
    $uni=M('university');
    $result=$uni->select();
    $this->assign("data",$result);
   	$this->display();
   }
}