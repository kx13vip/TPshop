<?php /* Smarty version Smarty-3.1.6, created on 2016-10-04 13:30:34
         compiled from "D:/wamp/www/TP/shop/Admin/View\Goods\update.html" */ ?>
<?php /*%%SmartyHeaderCode:1252657f1ff780f9ec9-56032868%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c15270f691ecdc4b3106b3e2d660740647efbd67' => 
    array (
      0 => 'D:/wamp/www/TP/shop/Admin/View\\Goods\\update.html',
      1 => 1475547123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1252657f1ff780f9ec9-56032868',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57f1ff7832c74',
  'variables' => 
  array (
    'info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57f1ff7832c74')) {function content_57f1ff7832c74($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改商品</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="<?php echo @ADMIN_CSS_URL;?>
mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
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
            <input type="hidden" name="goods_id" value='<?php echo $_smarty_tpl->tpl_vars['info']->value['goods_id'];?>
'/>
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>商品名称</td>
                    <td><input type="text" name="goods_name" value='<?php echo $_smarty_tpl->tpl_vars['info']->value['goods_name'];?>
'/></td>
                </tr>

                <tr>
                    <td>商品价格</td>
                    <td><input type="text" name="goods_price" value='<?php echo $_smarty_tpl->tpl_vars['info']->value['goods_price'];?>
'/></td>
                </tr>
                <tr>
                    <td>商品数量</td>
                    <td><input type="text" name="goods_number" value='<?php echo $_smarty_tpl->tpl_vars['info']->value['goods_number'];?>
'/></td>
                </tr>
                <tr>
                    <td>商品重量</td>
                    <td><input type="text" name="goods_weight" value='<?php echo $_smarty_tpl->tpl_vars['info']->value['goods_weight'];?>
'/></td>
                </tr>
                <tr>
                    <td>商品介绍</td>
                    <td>
                    <textarea name='goods_introduce'><?php echo $_smarty_tpl->tpl_vars['info']->value['goods_introduce'];?>
</textarea>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="修改">
                    </td>
                </tr>  
            </table>
            </form>
        </div>
    </body>
</html><?php }} ?>