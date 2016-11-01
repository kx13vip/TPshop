<?php
namespace Model;
use Think\Model;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-07 20:57:54
 * @version $Id$
 */

class RoleModel extends Model{
	//进行权限分配设置   $auth是一维数组信息给当前角色分配的权限id信息
	function saveAuth($auth,$role_id){
		//把权限数组信息分割成中间为逗号的字符串信息
		$auth_ids = implode(',' , $auth);
		//show_bug($auth_ids); 

		//根据ids权限id信息查询具体操作方法信息
		$info = D('Auth') -> select($auth_ids);//返回二维数组
		//show_bug($info);

		//拼装控制器与操作方法J
		$auth_ac = '';
		foreach($info as $k => $v){
			if (!empty($v['auth_c']) && !empty($v['auth_a'])) {
				$auth_ac .= $v['auth_c'] . '-' . $v['auth_a'] . ',';
			}
		}
		$auth_ac = rtrim($auth_ac,',');//删除最右边的逗号
		//show_bug($auth_ac);
		
		$dt = array(
				'role_id' => $role_id,
				'role_auth_ids' => $auth_ids,
				'role_auth_ac' => $auth_ac,
			);

		return $this -> save($dt);
	}
}













?>