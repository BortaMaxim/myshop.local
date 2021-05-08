<?php
//Основные функции



function loadPage($smarty, $controllerName, $actionName = 'index'){
    include_once PathPrefix. $controllerName. PathPostfix;

    $function = $actionName. 'Action';
    $function($smarty);
}


function loadTemplate ($smarty, $templateName) {
    $smarty->display($templateName. TemplatePostfix);
}

//отладочная функция
function d($value = null, $die = 1) {
   function debugOut($a) {
       echo '<br><b>' . basename($a['file']) . '</b>'
           ."&nbsp;<font color='red'>({$a['line']})</font>"
           ."&nbsp;<font color='green'>({$a['function']})</font>"
           ."&nbsp;--". dirname($a['file']);
   }

   echo '<pre>';
   $trace = debug_backtrace();
   array_walk($trace, 'debugOut');
   echo "\n\n";
//   var_dump($value);
    print_r($value);
   echo '</pre>';
   if ($die) $die;
}

//Преобразование работы функции выборки в ассоциативный массив
function createSmartyRsArray($rs) {
    if (!$rs) return false;

    $smartyRs = array();
    while($row = mysqli_fetch_assoc($rs)) {
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

//Redirect to "/"
function redirect($url) {
    if (!$url) $url = '/';
    header("Location: {$url}");
    exit();
}