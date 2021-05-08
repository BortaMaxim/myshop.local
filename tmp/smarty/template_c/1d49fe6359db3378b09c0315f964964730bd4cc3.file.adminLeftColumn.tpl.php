<?php /* Smarty version Smarty-3.1.6, created on 2021-04-30 16:49:54
         compiled from "../views/admin\adminLeftColumn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:688632270608aa491b4fb80-84326271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d49fe6359db3378b09c0315f964964730bd4cc3' => 
    array (
      0 => '../views/admin\\adminLeftColumn.tpl',
      1 => 1619794193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '688632270608aa491b4fb80-84326271',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_608aa491b509b',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_608aa491b509b')) {function content_608aa491b509b($_smarty_tpl) {?><style>
    #adminLeftColumn{
        margin-top: 150px;
        padding: 20px;
        border-radius: 5px;
        transition: all .3s ease;
    }
    #adminLeftColumn:hover{
        box-shadow: 2px 2px 6px #7c7c7c;
    }
.listMenu{
    padding: 0;
}
    .menuCaption{
        text-align: center;
    }
</style>
<div id="adminLeftColumn">
    <div id="leftMenu">
        <div class="menuCaption">
            <h2>Menu</h2>
        <ul class="listMenu">
            <li><a href="/admin/">Главная</a></li>
            <li><a href="/admin/category/">Категории</a></li>
            <li><a href="/admin/products/">Товар</a></li>
            <li><a href="/admin/orders/">Заказы</a></li>
        </ul>
        </div>
    </div>
</div><?php }} ?>