<?php
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-09-30 21:10:12
 * @version $Id$
 */
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");


class EmptyController extends Controller{
	//空操作方法
	public function _empty(){
		echo '控制器没有找到(空控制器)';
	}
}

?>