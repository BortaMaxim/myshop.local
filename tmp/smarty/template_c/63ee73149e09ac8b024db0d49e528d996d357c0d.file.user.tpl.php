<?php /* Smarty version Smarty-3.1.6, created on 2021-04-29 09:56:05
         compiled from "../views/default\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9943063726086bd34ca05f5-54988220%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ee73149e09ac8b024db0d49e528d996d357c0d' => 
    array (
      0 => '../views/default\\user.tpl',
      1 => 1619682947,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9943063726086bd34ca05f5-54988220',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_6086bd3524992',
  'variables' => 
  array (
    'arUser' => 0,
    'rsUserOrders' => 0,
    'item' => 0,
    'itemChild' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6086bd3524992')) {function content_6086bd3524992($_smarty_tpl) {?>
<style>
    a{
        color: #303134;
    }
    a:hover{
        color: red;
    }
</style>

<h1>Ваши регистрационные данные!</h1>

<table class="table table-secondary">
    <tbody>
        <tr>
            <td>Логин (email)</td>
            <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
        </tr>

        <tr>
            <td>Имя</td>
            <td><input class="form-control" type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
"/></td>
        </tr>

        <tr>
            <td>Тел</td>
            <td><input class="form-control" type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"/></td>
        </tr>

        <tr>
            <td>Адрес</td>
            <td><textarea class="form-control"  id="newAdress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
        </tr>

        <tr>
            <td>Новый пароль</td>
            <td><input class="form-control" type="password" id="newPwd1" value=""/></td>
        </tr>

        <tr>
            <td>Повтор пароля</td>
            <td><input class="form-control" type="password" id="newPwd2" value=""/></td>
        </tr>

        <tr>
            <td>Для того чтобы сохранить данные , введите текущий пароль</td>
            <td><input class="form-control" type="password" id="curPwd" value=""/></td>
        </tr>

        <tr>
            <td>&nbsp;</td>
            <td><input type="button" class="btn btn-primary" onclick="updateUserData();" value="Сохранить изменения"/></td>
        </tr>
    </tbody>
</table>

<h2>Заказы!</h2>
<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value){?>
    Заказов нет...
<?php }else{ ?>
    <table class="table table-secondary mt-3">
        <tr>
            <th>№</th>
            <th>Действие</th>
            <th>ID заказа</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Дополнительная информация</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsUserOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['orders']['iteration']++;
?>
            <tr>
                <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['orders']['iteration'];?>
</td>
                <td>
                    <a href="#"
                       onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;"

                    >
                        Показать товар заказа
                    </a>
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>

                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>

                    &nbsp;
                </td>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>

                </td>
            </tr>

            <tr class="hideme" id="purchaseForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                <td colspan="7">
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['children']){?>
                        <table class="table table-primary">
                            <tr>
                                <th>№</th>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Количество</th>
                            </tr>
                            <?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value){
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
                                <tr>
                                    <td><?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
                                    <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a></td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>
                                </tr>
                            <?php } ?>
                        </table>
                    <?php }?>
                </td>
            </tr>
        <?php } ?>
    </table>

<?php }?><?php }} ?>