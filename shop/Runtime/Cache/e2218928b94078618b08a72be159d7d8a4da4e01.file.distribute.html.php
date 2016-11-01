<?php /* Smarty version Smarty-3.1.6, created on 2016-10-08 15:15:22
         compiled from "D:/wamp/www/TP/shop/Admin/View\Role\distribute.html" */ ?>
<?php /*%%SmartyHeaderCode:1429957f78ac37652d4-08342357%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2218928b94078618b08a72be159d7d8a4da4e01' => 
    array (
      0 => 'D:/wamp/www/TP/shop/Admin/View\\Role\\distribute.html',
      1 => 1475910155,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1429957f78ac37652d4-08342357',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57f78ac38a96a',
  'variables' => 
  array (
    'role_name' => 0,
    'pauth_info' => 0,
    'v' => 0,
    'auth_ids_arr' => 0,
    'sauth_info' => 0,
    'vv' => 0,
    'tauth_info' => 0,
    'vvv' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f78ac38a96a')) {function content_57f78ac38a96a($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>添加权限</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet">
        <style type="text/css"> 
        
		li{list-style:none;}
		
        </style>
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：权限管理-》添加权限信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="<?php echo @__MODULE__;?>
/Goods/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">

            <form action="<?php echo @__SELF__;?>
" method="post" enctype="multipart/form-data">
			<div>正在为角色：<span style="font-size:25px;font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['role_name']->value;?>
</span>分配权限</div>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pauth_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['v']->value['auth_name'];?>
<input type="checkbox" name="authname[]" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['auth_id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['v']->value['auth_id'],$_smarty_tpl->tpl_vars['auth_ids_arr']->value)){?>checked='checked'<?php }?>/>
					<ul>
					<?php  $_smarty_tpl->tpl_vars['vv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vv']->_loop = false;
 $_smarty_tpl->tpl_vars['kk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sauth_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vv']->key => $_smarty_tpl->tpl_vars['vv']->value){
$_smarty_tpl->tpl_vars['vv']->_loop = true;
 $_smarty_tpl->tpl_vars['kk']->value = $_smarty_tpl->tpl_vars['vv']->key;
?>
					<?php if ($_smarty_tpl->tpl_vars['vv']->value['auth_pid']==$_smarty_tpl->tpl_vars['v']->value['auth_id']){?>
						<li><?php echo $_smarty_tpl->tpl_vars['vv']->value['auth_name'];?>
<input type="checkbox" name="authname[]" value="<?php echo $_smarty_tpl->tpl_vars['vv']->value['auth_id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['vv']->value['auth_id'],$_smarty_tpl->tpl_vars['auth_ids_arr']->value)){?>checked='checked'<?php }?>/>
                                                                            
                                                                            <ul>
                                                                            <?php  $_smarty_tpl->tpl_vars['vvv'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vvv']->_loop = false;
 $_smarty_tpl->tpl_vars['kkk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['tauth_info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vvv']->key => $_smarty_tpl->tpl_vars['vvv']->value){
$_smarty_tpl->tpl_vars['vvv']->_loop = true;
 $_smarty_tpl->tpl_vars['kkk']->value = $_smarty_tpl->tpl_vars['vvv']->key;
?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['vvv']->value['auth_pid']==$_smarty_tpl->tpl_vars['vv']->value['auth_id']){?>
                                                                                <li><?php echo $_smarty_tpl->tpl_vars['vvv']->value['auth_name'];?>
<input type="checkbox" name="authname[]" value="<?php echo $_smarty_tpl->tpl_vars['vvv']->value['auth_id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['vvv']->value['auth_id'],$_smarty_tpl->tpl_vars['auth_ids_arr']->value)){?>checked='checked'<?php }?>/></li>
                                                                            <?php }?>
                                                                            <?php } ?>
                                                                            </ul>
                                                    </li>
					<?php }?>
					<?php } ?>
					</ul>
				</li>
			<?php } ?>
			</ul>
			<input type="submit" velue="分配权限" />
            </form>
        </div>
    </body>
</html><?php }} ?>