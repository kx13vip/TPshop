<?php
namespace Model;
use Think\Model;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-04 10:43:38
 * @version $Id$
 */
class UserModel extends Model{
	//实现表单项目验证
	//通过重写父类属性_validate实现表单验证
    protected $_validate        =   array(  // 自动验证定义
    	//验证用户名
    	//array( array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]), 
    	array('username' , 'require' , '用户名必须填写'),
    	array('password' , 'require' , '密码必须填写'),

    	//可以为同一个项目设置多个验证
    	array('password2' , 'require' , '确认密码必须填写'),
    	array('password2' , 'password' , '与密码信息必须一致' , 0 , 'confirm'),

    	//邮箱验证
    	array('user_email' , 'email' , '邮箱格式不正确' , 2),

    	//验证qq,都是数字，长度5－10，首位不为0
    	array('user_qq' , "/^[1-9]\d{4,9}$/" , 'QQ格式不正确'),

    	//手机号验证
    	//array('user_tell' , "/^[1-9]\d{10}$/",'手机号格式不正确'),
    //学历验证：必须选择一个，值在2，3，4，5范围内
    array('user_xueli' , '2,3,4,5' , '必须选一个学历' , 0 , 'in'),
    
    //爱好项目至少选择两项以上
    	//爱好的值是一个数组，判断元素个数即可知道结果
    	//callback利用当前model里边的一个指定方法进行验证
    	array('user_hobby' , 'check_hobby' , '爱好必须两项以上' , 1 , 'callback'),


    );

    //自定义方法验证爱好信息
    //$name参数是当前项目的验证信息$name = $_POST['user_hobby']
    function check_hobby($name){
    	if (count($name) < 2) {
    		return false;
    	}else{
    		return true;
    	}
    }

    // 是否批处理验证
    protected $patchValidate    =   true;
    //protected $_auto            =   array();  // 自动完成定义
}

?>