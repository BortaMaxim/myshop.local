<?php /* Smarty version Smarty-3.1.6, created on 2021-05-04 10:32:27
         compiled from "../views/default\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:736377040607acf1ac9b428-98540684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '345bdb8f839f160ac4fa3a7e53630c8be64410e5' => 
    array (
      0 => '../views/default\\index.tpl',
      1 => 1620117067,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '736377040607acf1ac9b428-98540684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_607acf1b0e194',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607acf1b0e194')) {function content_607acf1b0e194($_smarty_tpl) {?>
<style>
    .card{
        box-shadow: 2px 2px 5px black;
        padding: 10px;
        transition: all .2s ease;
    }
    .card:hover{
        box-shadow: 5px 5px 10px black;
    }

</style>

<div class="container-fluid ">
    <div class="row justify-content-center text-white mb-100 ">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
            <div class="card card-demo text-white " style="width: 17rem; margin: 5px; padding: 10px;">
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
                    <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
" width="100%" height="200px">
                </a>
                <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
            </div>
        <?php } ?>
    </div>

</div>





<?php }} ?>