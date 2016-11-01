<?php
namespace Admin\Controller;
use Component\AdminController;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-08 08:55:19
 * @version $Id$
 */
class AuthController extends AdminController{
	function showlist(){
		$info = $this -> getInfo(true);
		$this -> assign('info' , $info);
		$this -> display();
	}

	function add(){
		if (!empty($_POST)) {
			//print_r($_POST);
			//在AuthModel里边通过一个指定的方法实现权限添加
			$auth = new \Model\AuthModel();
			$z = $auth -> addAuth($_POST);
			if ($z) {
				//echo 'success';
				$this -> success('添加权限成功' , U('showlist'));
			}else{
				//echo 'error';
				$this -> error('添加权限失败' , U('showlist'));
			}
		}else{

		//获得父级权限信息
		$info = $this -> getInfo(true);
		//show_bug($info);//把数据处理成array('1' =>'商品管理' , '2' => '添加商品', '3' =>'订单打印');以便在smarty模板中使用{html_options}的函数
		$authinfo = array();
		foreach($info as $v){
			$authinfo[$v['auth_id']] = $v['auth_name'];
		}
		//show_bug($authinfo);
		$this -> assign('authinfo' , $authinfo);
		$this -> display();
		}
	}

	function getInfo($flag=false){
		//如果$flag标志为false,查询全部信息
		//如果$flag标志为true，只查询level=0/1的权限信息
		$auth = D('Auth');
		if ($flag==true) {
			$info = D('Auth') -> where('auth_level<2') ->order('auth_path asc') -> select ();
		}else{
			$info = D('Auth') -> order('auth_path asc') -> select ();
		}
		foreach ($info as $k => $v){
			$info[$k]['auth_name'] = str_repeat('&nbsp;&nbsp;&nbsp;' , $v['auth_level']) . $info[$k]['auth_name'];
		}
		return $info;
	}



}













?>