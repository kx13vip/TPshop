<?php
namespace Admin\Controller;
use Component\AdminController;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-01 15:28:13
 * @version $Id$
 */


class ManagerController extends AdminController{
	public function login(){
		//display()没有参数，那么获得的模板名称与当前操作的名称一致
		//如display('hello'),那么就会找Admin/View/Manager/hello.html这个模板
		//echo 'login';

		//获得语言变量信息
		//L()获得全部语言    L（‘USERNAME’）获得指定语言
		//show_bug(L());
		if (!empty($_POST)) {
			//print_r($_POST);
			//验证码校验
			$verify = new \Think\Verify();
			if (!$verify -> check($_POST['captcha'])) {
				redirect('/TP/shop/index.php/Admin/Manager/login' , 2 ,'验证码不正确');
			}else{
				//判断用户名与密码，在Model模型里边制作一个专门方法进行验证
				$user = new \Model\ManagerModel(); 
				$rst = $user -> checkNamePwd($_POST['mg_username'] , $_POST['mg_password']);
				if ($rst === false) {
					redirect('/TP/shop/index.php/Admin/Manager/login' , 2 ,'用户名或密码不正确');
				}else{
					//登陆信息持久化
					//show_bug($rst);
					session('mg_username' , $rst['mg_name']);
					session('mg_id' , $rst['mg_id']);
					//页面跳转后台首页redirect();Action跳转(URL重定向） 支持指定模块和延时跳转
					//redirect($url,$params=array(),$delay=0,$msg=''),在controller文件里面，空间有点疑惑？这儿不是靠最近的空间吗？
					//$this -> redirect('Index/index' , array('id' => 100,'name' => 'tom') , 2 ,'用户马上登陆到后台');
					$this -> redirect('Index/index');


				}
			}
		}else{
		$this -> assign('Lang' , L());
		$this->display();
		}
	}


	//退出登陆方法
	public function logout(){
		session(null);
		$this -> redirect('Manager/login');
	}




	//制作专门方法实现验证码生成
	public function verifyImg(){
		ob_clean();//清除缓存，以免有缓存而无法显示
		//以下类verify在之前并没有include引入
		//走自动加载Think.calss.php   autoload方法
		$config = array(
	        'fontSize'  =>  14,              // 验证码字体大小(px)
	        'imageH'    =>  25,               // 验证码图片高度
	        'imageW'    =>  90,               // 验证码图片宽度
	        'fontttf'   =>  '4.ttf',              // 验证码字体，不设置随机获取
	        'length'    =>  4,               // 验证码位数
			);
		$verify = new \Think\Verify($config);
		//show_bug($verify);
		$verify -> entry();
	}

	function showlist(){
		$info = D('Manager') -> select();
		//查询全部角色的信息
		$rinfo = $this -> getRoleInfo();

		$this -> assign('rinfo' , $rinfo);
		$this -> assign('info' , $info);
		$this -> display();
	}

	function update($mg_id){
		if (!empty($_POST)) {
			//print_r($_POST);
			$manager = D('Manager');
			$manager -> create();
			$z = $manager -> save();
			if ($z) {
				$this -> success('修改管理员成功' , U('showlist'));
			}else{
				$this -> error('修改管理员失败' , U('showlist'));
			}

		}else{

		//获得被修改管理员信息
		$info = D('Manager') -> find($mg_id);

		//查询全部角色的信息

		$rinfo = $this -> getRoleInfo();
		$this -> assign('mg_id' , $mg_id);
		$this -> assign('info' , $info);
		$this -> assign('rinfo' , $rinfo);
		$this -> assign('role_id' , $info['mg_role_id']);
		$this -> display();
		}
	}

	function getRoleInfo(){
		//查询全部角色的信息
		$rrinfo = D('Role') -> select();//二维数组
		//把二维数组变成array(1=>'经理' ， 2=>'主管' ，3=>'总监')
		$rinfo = array();
		foreach($rrinfo as $k => $v){
			$rinfo[$v['role_id']] = $v['role_name'];
		}
		return $rinfo;
	}
}

?>