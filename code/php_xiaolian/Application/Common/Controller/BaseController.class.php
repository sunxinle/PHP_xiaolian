<?php
namespace Common\Controller;
use Org\Util\Rbac;
use Think\Controller;

class BaseController extends Controller {
    public function _initialize() {
        // 首先判断用户是否已经登录
        Rbac::checkLogin();

       //dump( Rbac::checkLogin());exit;
        // 再次判断用户是否具有当前访问权限
        //dump(session());exit();
        if (!Rbac::AccessDecision()) {
            $this->error('您不具有当前访问权限，请换个账户登录!', C('USER_AUTH_GATEWAY'));
        }

        // 0. 判断是否开启权限认证功能
//        if (C('USER_AUTH_ON')) {    // 当前应用程序已经开启权限认证功能
//            // 1. 判断当前模块是否有必要权限校验
//            $requireModules = explode(',', C('REQUIRE_AUTH_MODULE'));
//            if (in_array(MODULE_NAME, $requireModules)) {
//                // 当前模块需要校验
//                // 2. 执行RBAC权限校验
//                // 2.1 先判断用户是否登录
//                if (session('?' . C('USER_AUTH_KEY'))) {
//                    // 用户已经登录
//                    // 2.1.1 权限校验
//                    if (!Rbac::AccessDecision()) {
//                        // 当前用户不具有权限
//                        $this->error('您不具有当前访问权限，请换个账户登录!', C('USER_AUTH_GATEWAY'));
//                    }
//                    exit;
//                } else {
//                    // 用户尚未登录
//                    if (!C('GUEST_AUTH_ON')) {
//                        // 不允许游客访问
//                        $this->error('您还没有登录，请先登录再访问!', C('USER_AUTH_GATEWAY'));
//                    } else {
//                        // 允许游客访问
//                        // 允许游客访问所有操作
//                        // 允许游客访问指定操作（？）
//                    }
//                }
//            }
//            // 当前模块不需要校验，校验过程结束，将执行后续操作
//        }
    }
}