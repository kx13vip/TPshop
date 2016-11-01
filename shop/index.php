<?php
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-09-20 20:42:14
 * @version $Id$
 */
//一个输出调试函数
function show_bug($msg){
	echo "<pre style='color:red'>";
	var_dump($msg);
	echo '</pre>';
}

//定义前后的css/img/js常量
define('SITE_URL' , 'http://localhost/');
define('CSS_URL' , SITE_URL . 'TP/shop/public/Home/css/');
define('IMG_URL' , SITE_URL . 'TP/shop/public/Home/images/');
define('JS_URL' , SITE_URL . 'TP/shop/public/Home/js/');

define('ADMIN_CSS_URL' , SITE_URL . 'TP/shop/public/Admin/css/');
define('ADMIN_IMG_URL' , SITE_URL . 'TP/shop/public/Admin/img/');
define('ADMIN_JS_URL' , SITE_URL . 'TP/shop/public/Admin/js/');

//上传图片路径
define('IMG_UPLOAD' , SITE_URL . 'TP/shop/public/');

/*
新建目录，创建一个入口文件
引入TP的核心文件

可以把thinkphp的目录，放置在项目目录的下面，也可以放在项目目录的同级或者是上级
不推荐把TP放在项目目录下，因为很可能是多个项目共用TP框架
 */

//把当前tp的生产模式变为开发模式
define('APP_DEBUG' , true);



//引入TP核心文件
include('../thinkphp/ThinkPHP.php');




























?>