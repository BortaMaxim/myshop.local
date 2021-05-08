<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$pageTitle}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{$templateWebPath}css/main.css" type="text/css">
    <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="{$templateWebPath}js/admin.js"></script>
</head>
<body>
<style>
    #header{
        background-color: #15bf17;
        padding: 20px;
    }
    #centerColumn{
        margin-bottom: 50px;
    }
    .mainAdmin{
        margin-top: 50px ;
    }
    #centerColumn{
      padding-left: 100px;
    }

</style>
    <div id="header">
        <h1><a href="/admin/">Admin</a></h1>
    </div>
<div class="mainAdmin">

    <div class="container">
        <div class="row">
            <div class="col">
                {include file="adminLeftColumn.tpl"}
            </div>



