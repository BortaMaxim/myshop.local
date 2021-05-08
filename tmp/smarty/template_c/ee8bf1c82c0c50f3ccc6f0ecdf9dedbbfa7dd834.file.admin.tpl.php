<?php /* Smarty version Smarty-3.1.6, created on 2021-04-30 10:38:49
         compiled from "../views/admin\admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:309078822608aa491c05856-83846273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee8bf1c82c0c50f3ccc6f0ecdf9dedbbfa7dd834' => 
    array (
      0 => '../views/admin\\admin.tpl',
      1 => 1619771928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '309078822608aa491c05856-83846273',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608aa491c066e',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608aa491c066e')) {function content_608aa491c066e($_smarty_tpl) {?><style>
    .admin{
        width: 500px;
        height: auto;
        padding: 20px;
        margin: 20px 200px 100px 0;
        border-radius: 6px;
        box-shadow: 2px 2px 8px #7c7c7c;
    }
</style>

            <div class="col-9 admin">
                <div id="centerColumn">
                    <div id="blockNewCategory">
                        <h3>Новая категория</h3>

                        <div class="col-6 mt-5">
                            <input type="text" id="newCategoryName" class="form-control" name="newCategoryName" value="">
                        </div>

                        <h5 class="mt-5">Является подкатегорией для:</h5>

                        <div class="col-6">
                            <select  class="form-select" name="generalCatId" id="">
                                <option value="0">
                                    Главная категория
                                    <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
                                <?php } ?>
                                </option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 col-6 mt-3">
                            <input type="button"
                                   class="btn btn-success"
                                   onclick="newCategory();"
                                   value="Добавить категории">
                        </div>

                    </div>
                </div>
            </div>

<?php }} ?>