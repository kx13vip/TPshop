<?php

namespace Home\Controller;
use Think\Controller;

class UserController extends Controller{
    //用户登录
    function login(){
    	//echo U('User/login');//快捷函数
    	//echo '<br />';
    //echo 'logining';
        //用display();调用视图，是controller父类中的一个方法
        $this -> display();
    }

    //用户注册
    function register(){
      //$user = D('User');//注意这儿不能用这个方法实例化，因为这个是实例的父类Model，现在需要实例化操作user model
      $user = new \Model\UserModel();
    	//echo 'registering';
      if (!empty($_POST)) {
        $z = $user -> create();//集成表单验证
        if (!$z) {
          //验证失败，输出错误信息
          show_bug($user -> getError());
        }else{
          //把爱好由数组变为字符串’1，2，3‘
          //使用AR方式处理爱好的字段信息
          //create()方法收集的数据也是把数据变为模型对象的属性（多项）而$user->user_hobby只是收集的单项
          //$user -> user_hobby不能放在$user->add()之后，也不能放在$user -> create()之前，因为验证的是数组
                  $u = $user->user_hobby = implode(',' , $_POST['user_hobby']);
                  $rst = $user -> add();
                  if ($rst) {
                    //echo 'success';
                    $this -> success('注册成功' , U('Index/index'));
                  }else{
                    //echo 'error';
                    $this -> error('注册失败' , U('Index/index'));
           }
        }
      }else{
        $this -> display();
      }
    }

    //空操作
    //避免改方法被重复再各个控制器中书写，可以把该访问放到父类里边
    /*
    public function __call($m,$arg){
    }
    */
   public function _empty(){
   	echo '不好意思，这个方法不存在';
   }

   public function number(){
   	//模仿从数据库获得的数据
   	return '目前网站注册会员200万';
   }

}

