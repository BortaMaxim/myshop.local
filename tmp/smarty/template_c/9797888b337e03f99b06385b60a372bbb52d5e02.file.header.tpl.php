<?php /* Smarty version Smarty-3.1.6, created on 2021-05-01 22:13:40
         compiled from "../views/default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1453633039607ad668e4bd74-22878683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9797888b337e03f99b06385b60a372bbb52d5e02' => 
    array (
      0 => '../views/default\\header.tpl',
      1 => 1619900018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1453633039607ad668e4bd74-22878683',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_607ad66909bff',
  'variables' => 
  array (
    'templateWebPath' => 0,
    'pageTitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607ad66909bff')) {function content_607ad66909bff($_smarty_tpl) {?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css">
    <title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
    <script src="/js/jquery-1.7.1.min.js"></script>
    <script src="/js/main.js"></script>
</head>
<body class="navbar-scroll navbar-show">
<style>
    #centerColumn{
        margin-bottom: 50px;
    }
    #header{
        background-color: #d08820;
    }
</style>

<div id="header" class="navbar navbar-top navbar-expand-lg navbar-dark navbar-fixed" style="z-index: 100">
    <div class="row">
        <h1><a href="http://www.myshop.local/">Shop Market</a></h1>
    </div>
</div>


<div id="flexbox">

<?php echo $_smarty_tpl->getSubTemplate ("leftColumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div id="centerColumn">

<?php }} ?>