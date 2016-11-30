<?php
namespace Home\Controller;

use Org\Util\Rbac;
use Think\Controller;

class UserController extends Controller {
    public function login() {
        $this->display();
    }

    public function dologin() {
        // 构造condition条件
        $condition = array();
        $condition['name'] = I('post.username');
        $condition['passwd'] = I('post.password', '', 'md5');
        // 调用RBAC方法实现用户校验
        $authInfo = Rbac::authenticate($condition);
        if ($authInfo) {    // 用户名和密码成立
            // 写入session数据（自由修改）
            session('loginedUserName', $authInfo['name']);
            // 写入权限认证识别号
            session(C('USER_AUTH_KEY'), $authInfo['id']);
            // 在session中写入当前角色的权限列表
            Rbac::saveAccessList($authInfo['id']);
            // 登录成功后的跳转
            $this->success('登录成功！', '/Admin');
        } else {
            $this->error('用户名或密码错误，请重新登录！');
        }
    }
}

//        // 验证码校验（本例中没有该功能）
//        // 1. 判断用户名和密码的有效性
//        $condition = array();
//        $condition['name'] = I('post.username');
//        $condition['passwd'] = I('post.password', '', 'md5');
//        if (0 !== M(C('USER_AUTH_MODEL')->where($condition)->count())) {
//            // 2. 若用户名和密码成立，登录成功
//            // 写入session数据
//            session('loginedUserName', I('post.username'));
//            // 写入权限认证识别号
//            session(C('USER_AUTH_KEY'), 当前用户的主键id);
//            // 在session中写入当前角色的权限列表
//            Rbac::saveAccessList(当前用户的主键id);
//        } else {
//            // 3. 若用户名和密码不成立，登录失败；返回登录页面重新登录
//        }
