<?php /* Smarty version Smarty-3.1.6, created on 2021-04-27 19:39:32
         compiled from "../views/default\order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38469093160881025662873-26982304%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '666b6bc8023c125a090718b73de3d72f4408aabe' => 
    array (
      0 => '../views/default\\order.tpl',
      1 => 1619545169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38469093160881025662873-26982304',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608810256c396',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
    'arUser' => 0,
    'buttonClass' => 0,
    'name' => 0,
    'phone' => 0,
    'adress' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608810256c396')) {function content_608810256c396($_smarty_tpl) {?>

<h2>Данные заказа</h2>
<form id="frmOrder" action="/cart/saveorder/" method="post">

<table class="table table-danger mt-5">
    <thead>
        <tr>
            <td>№</td>
            <td>Найменование</td>
            <td>Количество</td>
            <td>Цена</td>
            <td>Сумма</td>
        </tr>
    </thead>
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
            <td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
            <td>
                <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

                </span>
            </td>
            <td>
                <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                </span>
            </td>
            <td>
                <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                    <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
">
                    <?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

                </span>
            </td>
        </tr>
    <?php } ?>
</table>

<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)){?>
    <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable('', null, 0);?>
    <h2>Данные заказчика</h2>
    <div id="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>
        <?php $_smarty_tpl->tpl_vars['name'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['name'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['phone'], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['adress'] = new Smarty_variable($_smarty_tpl->tpl_vars['arUser']->value['adress'], null, 0);?>

        <table class="table table-danger mt-5">
            <tr>
                <td>Имя*</td>
                <td><input class="form-control" type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"></td>
            </tr>
            <tr>
                <td>Тел*</td>
                <td><input class="form-control" type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
"></td>
            </tr>
            <tr>
                <td>Адрес*</td>
                <td><textarea class="form-control" id="adress" name="adress" value="<?php echo $_smarty_tpl->tpl_vars['adress']->value;?>
"></textarea></td>
            </tr>
        </table>
    </div>
<?php }else{ ?>
    <div id="loginBox" class="row">
        <h3 class="menuCaption">Авторизация</h3>
          <table class="table table-danger">
                <tr>
                    <td>Логин</td>
                    <td>
                        <input class="form-control mt-2" type="email" id="loginEmail" name="loginEmail" value="">
                    </td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td>
                        <input class="form-control mt-2" type="password" id="loginPassword" name="loginPassword" value="">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="button" value="Войти" onclick="login();">
                    </td>
                </tr>
          </table>
    </div>

    <div id="registerBox">
        <h2 class="menuCaption">Регистрация нового пользователя: </h2>

        <label for="email">Email*</label>
        <input type="text" id="email" name="email" value="" class="form-control">

        <label for="password">Пароль*</label>
        <input type="password" id="pwd1" name="pwd1" value="" class="form-control">

        <label for="password">Повторить пароль*</label>
        <input type="password" id="pwd2" name="pwd2" value="" class="form-control mb-3">

        Имя*: <input class="form-control" type="text" id="name" name="name" value=""><br>
        Телефон*: <input class="form-control" type="text" id="phone" name="phone" value=""><br>
        Адрес*: <textarea class="form-control" name="adress" id="adress"></textarea><br>

        <input type="button" onclick="registerNewUser();" value="Регистрация" class="btn btn-primary mb-3">
    </div>

    <?php $_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_variable("class='hideme'", null, 0);?>
<?php }?>

    <input
            <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>

            class="btn btn-success"
            id="btnSaveOrder"
            type="button"
            value="Оформить заказ"
            onclick="saveOrder();"
    />
</form>
<?php }} ?>