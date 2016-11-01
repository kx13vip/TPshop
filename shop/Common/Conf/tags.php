<?php
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-05 11:23:20
 * @version $Id$
 */
return array(
	//以下内容把ThinkPHP/Model/common.php的指定配置给覆盖掉
        'app_begin'       =>  array(
            'Behavior\ReadHtmlCacheBehavior', // 读取静态缓存
            'Behavior\CheckLangBehavior', // 启动多语言支持
        ),

	);

?>