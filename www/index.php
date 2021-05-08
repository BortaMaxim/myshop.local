<?php
session_start(); //стартуем сессию

//если в сессии нет массива корзины, то содзаем его
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();

}

//Константы для обращения к контроллерам

include_once '../config/config.php';  //инициализация настроек
include_once '../config/db.php';
include_once '../library/mainFunctions.php'; // Основные функции


//определяем с каким контроллером будеи работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
// определяем с какой функцией будем работать
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

//если в сессии есть данные об авторезированом пользователе, то передаем их шаблон
if (isset($_SESSION['user'])) {
    $smarty->assign('arUser', $_SESSION['user']);
}


//инициализируем переменную шаблонизатора количества елементов корзине
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);