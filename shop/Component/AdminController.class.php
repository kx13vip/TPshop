<?php
	namespace Component;
	use Think\Controller;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-06 21:13:19
 * @version $Id$
 */

class AdminController extends Controller{
	//构造方法

	function __construct(){
		parent::__construct();//先执行父类的构造方法，否则系统要报错；因为原先的构造方法默认是被执行的
		//用构造方法来过滤当前控制器和方法，避免用户的非法请求
		//通过角色可以获得用户可以访问的控制器和方法

		//CONTROLLER_NAME ------Goods
		//ACTION_NAME-------showlist
		//当前请求操作
		$now_ac = CONTROLLER_NAME."-".ACTION_NAME;
		//show_bug($_SESSION['mg_id']);
		//解决$_SESSION['mg_id'];为空时报错不执行的情况
		if ($_SESSION['mg_id'] == null){
			$_SESSION['mg_id'] = 1000000;//用一个不存在的值不让期报错
		}
		$sql = "select role_auth_ac,mg_role_id from sw_manager a join sw_role b on a.mg_role_id=b.role_id where a.mg_id=" . $_SESSION['mg_id'];//$_SESSION['mg_id'];不存在时报错不在执行
		$auth_ac = D()->query($sql);
		//show_bug($auth_ac);
		$auth_ac = $auth_ac[0]['role_auth_ac'];
		//$mg_role_id = $auth_ac[0]['mg_role_id'];
		//show_bug($now_ac);
		//show_bug($auth_ac);

        //判断$now_ac是否在$auth_ac字符串里边有出现过
        //strpos函数如果返回false是没有出现，返回0 1 2 3表示有出现
		//show_bug(strpos($auth_ac,$now_ac));
		//$allow_ac这些方法不进行权限限制
        $allow_ac = array('Index-left','Index-right','Index-head','Index-index','Manager-login','Manager-verifyImg','Manager-logout');
		if(!in_array($now_ac,$allow_ac) && $_SESSION['mg_id'] !=1 && strpos($auth_ac,$now_ac) === false){
		//if (!in_array($now_ac,$allow_ac) && $mg_role_id!==0 && strpos($auth_ac,$now_ac) === false) {
			$this -> error('没有权限访问',U("Index/right"));
		}
	}
}


































?>