<?php /* Smarty version Smarty-3.1.6, created on 2021-05-03 11:27:19
         compiled from "../views/admin\adminProducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:899855570608bcda74c8337-41455399%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61841b8e82aca4be8c4677ab9d757aa621ae9f09' => 
    array (
      0 => '../views/admin\\adminProducts.tpl',
      1 => 1620034038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '899855570608bcda74c8337-41455399',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608bcda751caf',
  'variables' => 
  array (
    'rsCategories' => 0,
    'itemCat' => 0,
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608bcda751caf')) {function content_608bcda751caf($_smarty_tpl) {?><style>
    .adminProducts{
        padding: 20px;
        width: 800px;
        margin-top: 20px;
        text-align: center;
    }
    .redactor{
        width: 1000px;
        margin: 20px auto;
    }
    h4{
        text-align: center;
    }
    img {
        width: 30px;
        height: 30px;
    }
</style>



<div class="col-9 adminProducts">
    <h2>Товар</h2>
    <input class="btn btn-primary" type="button" value="Сохранить в XML" onclick="createXML();"/>
    <div id="xml_place"></div>
    <hr>
    <span class="mb-3">Импорт</span>
    <form action="/admin/loadformxml/" method="post" enctype="multipart/form-data">
        <input class="btn btn-primary" type="file" name="filename"><br>
        <input class="btn btn-success mt-2" type="submit" value="Загрузить">
    </form>
    <hr>
    <label class="mt-3">Добавить продукт</label>
    <table class="table table-primary mt-3">
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Сохранить</th>
        </tr>
        <tr>
            <td>
                <input class="form-control" type="edit" id="newItemName" value="">
            </td>
            <td>
                <input class="form-control" type="edit" id="newItemPrice" value="">
            </td>
            <td>
                <select class="form-select"  id="newItemCatId">
                    <option value="0">Главная категория</option>
                    <?php  $_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->key => $_smarty_tpl->tpl_vars['itemCat']->value){
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
?>
                        <?php if ($_smarty_tpl->tpl_vars['itemCat']->value['parent_id']){?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>
                        <?php }?>
                    <?php } ?>
                </select>
            </td>
            <td>
                <textarea class="form-control"  id="newItemDesc"></textarea>
            </td>
            <td>
                <input type="button" class="btn btn-primary" value="Сохранить" onclick="addProduct();">
            </td>
        </tr>
    </table>
</div>

<h4>Редактировать</h4>
<table class="table table-primary mt-3 redactor">
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Категории</th>
        <th>Описание</th>
        <th>Удалить</th>
        <th>Изображения</th>
        <th>Сохранить</th>
    </tr>
   <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
        <tr>
            <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
            <td>
                <input class="form-control" type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
            </td>
            <td>
                <input class="form-control" type="edit" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
            </td>
            <td>
                <select class="form-select"  id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <option value="0">Главная категория</option>
                    <?php  $_smarty_tpl->tpl_vars['itemCat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemCat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->key => $_smarty_tpl->tpl_vars['itemCat']->value){
$_smarty_tpl->tpl_vars['itemCat']->_loop = true;
?>

                        <option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['category_id']==$_smarty_tpl->tpl_vars['itemCat']->value['id']){?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>

                    <?php } ?>
                </select>
            </td>
            <td>
                <textarea class="form-control"  id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

                </textarea>
            </td>
            <td>
                <input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status']==0){?> checked="checked" <?php }?>>
            </td>
            <td>
                <?php if ($_smarty_tpl->tpl_vars['item']->value['image']){?>
                    <img class="cart" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
                <?php }?>
                <form action="/admin/upload/" method="post" enctype="multipart/form-data">
                    <input class="btn btn-info form-control" type="file" name="filename"><br>
                    <input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <input class="btn btn-success" type="submit" value="Загрузить"><br>
                </form>
            </td>
            <td>
                <input class="btn btn-success" type="button" value="Сохранить" onclick="updateProduct(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">
            </td>
        </tr>
   <?php } ?>
</table><?php }} ?>