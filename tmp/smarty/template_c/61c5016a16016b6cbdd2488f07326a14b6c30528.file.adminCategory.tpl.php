<?php /* Smarty version Smarty-3.1.6, created on 2021-04-30 10:53:17
         compiled from "../views/admin\adminCategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1662705538608ae37dc4a574-71321257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61c5016a16016b6cbdd2488f07326a14b6c30528' => 
    array (
      0 => '../views/admin\\adminCategory.tpl',
      1 => 1619772399,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1662705538608ae37dc4a574-71321257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608ae37e4383a',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'rsMainCategories' => 0,
    'mainItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608ae37e4383a')) {function content_608ae37e4383a($_smarty_tpl) {?><style>
    .catTitle{
        text-align: center;
        margin-bottom: 50px;
    }
    .category{
        margin-top: 20px;
        padding: 20px;
        margin-bottom: 100px;

    }

</style>

<div class="col-9 category">
    <div class="container">
        <h2 class="catTitle">Категории</h2>
        <table class="table table-success">
            <tr>
                <th>№</th>
                <th>ID</th>
                <th>Название</th>
                <th>Родительская категория</th>
                <th>Действие</th>
            </tr>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['categories']['iteration']++;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['categories']['iteration'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
                    <td>
                        <input class="form-control" type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                    </td>
                    <td>
                        <select class="form-select"  id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <option value="0">
                                Главная категория
                                <?php  $_smarty_tpl->tpl_vars['mainItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mainItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsMainCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->key => $_smarty_tpl->tpl_vars['mainItem']->value){
$_smarty_tpl->tpl_vars['mainItem']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id']==$_smarty_tpl->tpl_vars['mainItem']->value['id']){?> selected <?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>

                            </option>
                            <?php } ?>
                            </option>
                        </select>
                    </td>
                    <td>
                        <input class="btn btn-success" type="button" value="Сохранить" onclick="updateCat(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<?php }} ?>