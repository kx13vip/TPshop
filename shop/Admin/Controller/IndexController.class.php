<?php
namespace Admin\Controller;
use Component\AdminController;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-09-30 21:53:37
 * @version $Id$
 */
class IndexController extends AdminController{
	//这是frameset  html框架集成方法
	public function index(){
		$this->display();
	}


	//后台展现头部
	//获得当前系统给我们提供了什么常量可供使用（系统和自定义的）
	//get_defined_constants([true]);
	//true参数会把常量进行自动分组显示

	function head(){
		$this->display();
	}

	//右边展现部分
	function right(){
		$this->display();
	}

	//左边展现部份
	function left(){
		//根据session用户id信息查询角色id信息
		$sql = "select * from sw_manager where mg_id=" . $_SESSION['mg_id'];
		$minfo = D() -> query($sql);
		//print_r($minfo);//二维数组
		$role_id = $minfo[0]['mg_role_id'];

		//根据角色信息获得权限ids的信息
		//$rinfo = D('Role') -> getByRole_id($role_id);//根据字段查询，但必须得有相应的Model模型；这样做比较麻烦，就直接用sql
		$sql = "select * from sw_role where role_id=" . $role_id;
		$rinfo = D()->query($sql);
		$auth_ids = $rinfo[0]['role_auth_ids'];

		//根据$auth_ids查询全部拥有的权限信息
		//1.获得顶级的权限
		$sql = "select * from sw_auth where auth_level=0 ";
		//如果是admin管理员要实现全部权限
		if($_SESSION['mg_id'] !=1){//这儿应该用权限为0的业判断更好？
		//if($role_id !==0){//用权限来更合理
			$sql .=" and auth_id in ($auth_ids)";
		}

		$p_info = D() -> query($sql);//返回一个二维数组,其实上面三个sql语句可以用联表查询
		//show_bug($ainfo);
		//2.获得次顶级权限
		$sql = "select * from sw_auth where auth_level=1 ";
		if($_SESSION['mg_id'] !=1){//用权限来更合理,超级管理员只有一个
			$sql .=" and auth_id in ($auth_ids)";
		}
		$s_info = D() -> query($sql);
		$this -> assign('pauth_info' , $p_info); 
		$this -> assign('sauth_info' , $s_info); 


		//var_dump(get_defined_constants(true));
		$this->display();
	}

}

?>