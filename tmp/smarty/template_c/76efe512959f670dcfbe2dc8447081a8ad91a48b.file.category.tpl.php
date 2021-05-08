<?php /* Smarty version Smarty-3.1.6, created on 2021-05-02 12:19:29
         compiled from "../views/default\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154529209607bfe74d3e459-89686437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76efe512959f670dcfbe2dc8447081a8ad91a48b' => 
    array (
      0 => '../views/default\\category.tpl',
      1 => 1619950768,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154529209607bfe74d3e459-89686437',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_607bfe74e9514',
  'variables' => 
  array (
    'rsCategory' => 0,
    'rsProducts' => 0,
    'rsChildCats' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607bfe74e9514')) {function content_607bfe74e9514($_smarty_tpl) {?>
<style>
    .card{
        box-shadow: 2px 2px 5px black;
        padding: 10px;
        transition: all .2s ease;
    }
    .card:hover{
        box-shadow: 5px 5px 10px black;
    }
    .products{
        padding: 100px 0;
    }
    .categoryTitle{
        margin-bottom: 60px;
        text-align: center;
    }
    .notProdutcs{
        margin-top: 100px;
    }
    .title{
        text-align: center;
        margin-top: 50px;
    }
</style>

<h2 class="title">Товары категории<?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h2>

<?php if ($_smarty_tpl->tpl_vars['rsProducts']->value||$_smarty_tpl->tpl_vars['rsChildCats']->value){?>
    <div class="container-fluid">
        <div class="row products">
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                        <div class="card " style="width: 17rem; margin: 5px; padding: 10px;">
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

            <div class="categoryTitle">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsChildCats']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <h2><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></h2>
                <?php } ?>
            </div>
        </div>
    </div>
<?php }else{ ?>
    <div class="notProdutcs">
        <h2 style="color: red"><ins>Товаров нет...</ins></h2>
    </div>

<?php }?><?php }} ?>