<?php
namespace Model;
use Think\Model;
header("content-type:text/html;charset=utf-8");
/**
 * 2016-09-19开始thinkphp学习!Come On Go!
 * @authors Your Name (you@example.org)
 * @date    2016-10-02 14:05:30
 * @version $Id$
 */

class QqModel extends Model{

	//定义当前模型操作真实的数据表
	//protected $trueTableName    =   'tencent_qq';
	protected $tablePrefix      =   'tencent_';
}

?>