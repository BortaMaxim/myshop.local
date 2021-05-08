<?php /* Smarty version Smarty-3.1.6, created on 2021-05-01 22:01:17
         compiled from "../views/default\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1673387441607c29be3c24a5-77426229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5df48fe23d6db1928059ffcf8dc8290e0a3146e' => 
    array (
      0 => '../views/default\\product.tpl',
      1 => 1619899276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1673387441607c29be3c24a5-77426229',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_607c29be4353f',
  'variables' => 
  array (
    'rsProduct' => 0,
    'itemInCart' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607c29be4353f')) {function content_607c29be4353f($_smarty_tpl) {?>

<style>
    img {
        margin: 30px 50px;
        width: 500px;
        height: 300px;
    }
    .decripton{
        margin-top: 20px;
    }
    .product_content{
        box-shadow: 2px 2px 6px #7c7c7c;
        padding: 20px;
        border-radius: 10px ;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    h3 {
        margin-left: 50px;
    }
    .addToBasket{
        margin: 20px 0 100px 50px;
        display: inline-block;
    }

    .basket{
        background-color: #cd1212;
        padding: 10px 30px;
        color: #bec3cb;
        text-decoration: none;
        box-shadow: 2px 2px 6px #303134;
        transition: all .2s ease-in-out;
        font-weight: 700;
    }
    .basket:hover{
        background-color: #f60404;
        color: #9af607;
    }


   .basket.green{
        background-color: #78b518;
        color: black;
        transition: all .2s ease-in-out;
    }
    .green:hover{
        background-color: #9dff04;
        color: black;
    }
    .hideme{
        display: none;
    }
    a{
        color: #303134;
        text-decoration: none;
    }
    a:hover{
        color: red;
    }
</style>
<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<div class="product_content">
    <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
">

    <div>
        <h4>Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
 <strong>$</strong></h4>
        <div class="decripton">
            <h4>Описания:</h4><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>

        </div>
    </div>
</div>

<div class="addToBasket">
    <a
       id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
"
       <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value){?>class="basket hideme" <?php }?>
       href="#"
       onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;"
       alt="Удалить из корзины"
    >
        Удалить из корзины
    </a>

    <a
       id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
"
       <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value){?>class="basket green hideme" <?php }?>
       href="#"
       onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;"
       alt="Добавить в корзину"
    >
        Добавить в корзину
    </a>
</div>


<?php }} ?>