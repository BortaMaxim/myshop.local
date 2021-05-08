<?php /* Smarty version Smarty-3.1.6, created on 2021-04-27 14:01:09
         compiled from "../views/default\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1430624589607d5be817f7f1-28175318%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba49ac498b8cf2b9e90bf9a7a8f97ee29f5cd8d0' => 
    array (
      0 => '../views/default\\cart.tpl',
      1 => 1619524732,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1430624589607d5be817f7f1-28175318',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_607d5be8367b8',
  'variables' => 
  array (
    'rsProducts' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607d5be8367b8')) {function content_607d5be8367b8($_smarty_tpl) {?>
<style>
    a{
        text-decoration: none;
        color: #303134;
    }
    a:hover{
        color: red;
    }
    .width{
        width: 150px;
    }
    .hideme{
        display: none;
    }
</style>
<h1>The Basket</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value){?>
В корзине пусто...

<?php }else{ ?>
    <form action="/cart/order/" method="post">
        <h2 class="mt-5">Заказы</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>№</td>
                    <td>наименивание</td>
                    <td>количество</td>
                    <td>цена</td>
                    <td>сумма</td>
                    <td>действие</td>
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
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></td>
                    <td><input
                                type="text"
                                class="form-control width"
                                name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                                value="1"
                                onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"
                        >
                    </td>
                    <td>
                        <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

                        </span>
                    </td>
                    <td>
                        <a href="#"
                           class="btn btn-danger"
                        id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                        onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false"
                        title="Удалить"
                        >
                            Удалить
                        </a>

                        <a href="#"
                           id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"
                           class="btn btn-success hideme"
                           onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false"
                           title="Востановить"
                        >
                            Востановить
                        </a>
                    </td>
                </tr>

            <?php } ?>
        </table>
        <input
                type="submit"
                class="btn btn-success"
                value="Оформить заказ"
        >
    </form>
<?php }?>


<?php }} ?>