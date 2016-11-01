<?php
//声明命名空间
namespace beijing;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-04 19:24:29
 * @version $Id$
 */

function getName(){
	return 'hello';
}
//可以使用到前边声明最近的命名空间的getName();
//echo getName();//hello

namespace shengyang;
function getName(){
	return '沈阳';
}

//声明命名空间
namespace dalian;
function getName(){
	return 'world';
}
//echo getName();//   [非限定名称]      获得最近的命名空间的getName();  world

//根据命名空间决定使用哪个getName()
//会认为在当前命名空间里边获得dalian\beijing\getName   相对定位
//echo beijing\getName();//	[限定名称]   相对方式

//如下：绝对定位
echo \beijing\getName();//这样就会找到beijing命名空间下的getName();//hello
echo \shengyang\getName();//沈阳   [完全限定名称]


?>