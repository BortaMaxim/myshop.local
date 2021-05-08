<?php /* Smarty version Smarty-3.1.6, created on 2021-05-01 21:35:50
         compiled from "../views/default\leftColumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1163753507607ad669196545-80459201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '920cfebf67a0d81acf3d581ab2cf4673542d9b6a' => 
    array (
      0 => '../views/default\\leftColumn.tpl',
      1 => 1619897749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1163753507607ad669196545-80459201',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_607ad669202c8',
  'variables' => 
  array (
    'rsCategories' => 0,
    'item' => 0,
    'itemChild' => 0,
    'arUser' => 0,
    'hideLoginBox' => 0,
    'cartCntItems' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607ad669202c8')) {function content_607ad669202c8($_smarty_tpl) {?><style>
    .linkBasket{
        text-decoration: none;
        font-size: 20px;
        color: #303134;
    }
    .linkBasket:hover{
        color: red;
    }
    .cartItem{
        margin-left: 5px;
        font-weight: 700;
    }
    a{
        text-decoration: none;
        color: #303134;
    }
    .userBox a{
        color: #303134;
        margin-bottom: 10px;
        font-weight: 700;
        transition: all .2s ease-in-out;
    }
    .userBox a:first-child:hover{
        color: red;
        font-size: 20px;
    }
  .hideme{
      display: none;
  }
  .menuCaptionRegister{
      cursor: pointer;
  }
  .menuCaptionRegister:hover{
      color: red;
  }
  .registerBoxHidden{
      display: none;
  }

</style>

<div id="leftMenu">
    <div class="menu">
        <ul class="listMenu" style="padding: 20px; margin-top: ;" >
            <h2>Menu</h2>
            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rsCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br>

                <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])){?>
                    <?php  $_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itemChild']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->key => $_smarty_tpl->tpl_vars['itemChild']->value){
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
?>
                        -<a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br>
                    <?php } ?>
                <?php }?>
            <?php } ?>
        </ul>
    </div>

    <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)){?>

        <div id="userBox" class=" userBox">
            <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br>
            <a href="/user/logout/" class="btn btn-danger mt-3"  onclick="logout();">Выход</a>
        </div>

    <?php }else{ ?>

        <div id="userBox" class="hideme userBox">
            <a href="#" id="userLink"></a><br>
            <a href="/user/logout/" class="btn btn-danger mt-3"  onclick="logout();">Выход</a>
        </div>

        <?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)){?>
            <div id="loginBox">
                <h3 class="menuCaption">Авторизация</h3>
                <input placeholder="Email"  class="form-control mt-2" type="email" id="loginEmail" name="loginEmail" value="">
                <input placeholder="Password" class="form-control mt-2" type="password" id="loginPassword" name="loginPassword" value="">
                <input type="submit"
                       id="loginSubmit"
                       class="btn btn-primary mt-2"
                       name="loginSubmit"
                       value="Войти"
                       onclick="login();"
                >
            </div>


            <div id="registerBox">
                <h3 class="menuCaptionRegister showHidden mt-5" onclick="showRegisterBox(); return false;">Регистрация</h3>
                <div class="registerBoxHidden">
                    <label for="email">Email</label>
                    <input placeholder="Email" type="text" id="email" name="email" value="" class="form-control">

                    <label for="password">Пароль</label>
                    <input placeholder="Password" type="password" id="pwd1" name="pwd1" value="" class="form-control">

                    <label  for="password">Повторить пароль</label>
                    <input placeholder="Reapeat Password" type="password" id="pwd2" name="pwd2" value="" class="form-control mb-3">
                    <input type="button" onclick="registerNewUser();" value="Регистрация" class="btn btn-primary mb-3">
                </div>
            </div>

     <?php }?>
<?php }?>

    <div class="menu_basket">
        <h4 class="menuCaption">Корзина:</h4>
        <a class="linkBasket" href="/cart/" title="Перейти в корзину">В корзине:</a>
        <span id="cartCntItems" class="cartItem">
            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value>0){?> <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>
 <?php }else{ ?>пусто <?php }?>
        </span>
    </div>


</div><?php }} ?>