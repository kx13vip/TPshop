<?php
namespace Model;
use Think\Model;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-05 16:03:04
 * @version $Id$
 */

class ManagerModel extends Model{
	//制作一个对用户名和密码进行验证
	public function checkNamePwd($name,$pwd){
		//1. 根据$name查询是否有此记录
		//select * from sw_manager where mg_name = $name;
		//查询的方法有select() find()
		//第三种根据字段查询：getByXXX()   getByMg_name($name)
		//getByMg_pwd()；父类Model利用__call()封闭的方法
		$info = $this -> getByMg_name($name);//在Model内部直接用$this就可以了，不用实例化
		//getBYXXX();函数返回一维数组信息
		//$info = null说明用户名错误，返回一维数组用户名正确
		//show_bug($info);
		//$info不为null就可以继续验证密码
		if ($info != null) {
			if ($info['mg_pwd'] != $pwd) {
				return false;
			}else{
				return $info;//后面得用到$info做session
			}
		}else{
			return false;
		}
	}
}



?>