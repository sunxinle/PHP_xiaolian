<?php
/**
 * Created by PhpStorm.
 * User: 郭颖
 * Date: 2016/12/16
 * Time: 11:21
 */

namespace Home\Controller;


use Think\Controller;

class GameController extends Controller
{
	public function plane(){
		$this->display();
	}
	public function shuzi(){
		$this->display();
	}
}