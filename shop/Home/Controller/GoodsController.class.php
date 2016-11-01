<?php

//商品控制器
namespace Home\Controller;
use Think\Controller;

class GoodsController extends Controller{
    //商品列表
    function showlist(){
    	//获得User控制器的number方法返回的信息
    	/*
    	当前UserController会通过自动加载机制引入
    	ThinkPHP/Library/Think/Think.class.php文件中的function autoload()

    	系统函数库：ThinkPHP/Common/functions.php查找A（）函数
    	实例化多层控制器 格式：[资源://][模块/]控制器
    	A([项目://][模块/]控制器标志);
    	 */
    	//$user = new UserController();
    	//echo $user -> number();
    	
    	$user = A('User');//通过快捷函数实例化控制器对象，new一个控制器对象给我们返回
    	echo $user -> number();

    	$goods = A('Admin/Goods');
    	echo $goods -> getMoney();

    	//跨项目、跨模块调用指定控制器
    	//$index = A('book://Home/Index');
    	//echo $index -> getName();//没有调用成功，未知原因

    	//简便操作
    	//R('[项目//][模块/]控制器/操作方法');
    	//实例化对象之后再调用其对应的方法
    	echo R('User/number');

    	echo R('Admin/Goods/getMoney');

    	//echo R('book://Home/Index/getName');

        $this -> display();
    }
    //商品详细信息
    function detail(){
        $this -> display();
    }


}

