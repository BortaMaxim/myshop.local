<?php

//контроллер корзины  (/cart/1)

//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

//добавление продукта в корзину
function addToCartAction() {
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (!$itemId) return false;

    $resData = array();

    //если значение не найдено , то добавляем
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) == false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    }else{
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}



//удаление элеменов из корзины
function removeFromCartAction() {
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (! $itemId) exit();

    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    }else{
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}

//формирование страницы корзины (/cart/)

function indexAction($smarty) {
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);

    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}

//формирование страницы заказа
function orderAction($smarty) {
    //плучаем массив id продуктов
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;

    //если корзина пуста , то редирект в корзину
    if (!$itemsIds) {
        redirect('/cart/');
        return;
    }

    //плучаем из массива POST количество покупаемых товаров
    $itemsCnt = array();
    foreach ($itemsIds as $item) {
        //формируем ключ массива POST
        $postVar = 'itemCnt_' . $item;
        //создаем элемент массива количество покупаемого товара
        //ключ массива ID товара, значение массива -количество товара
        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }

    //получаем список продуктов по массиву корзины
    $rsProducts = getProductsFromArray($itemsIds);

    //добавляем каждому продукту дополнительное поле
    //"realPrice" = количествопродуктов * на цену продукта
    //"cnt" = количество покупаемого товара
    $i = 0;
    foreach ($rsProducts as &$item) {
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if ($item['cnt']) {
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            //если случится так , что товар в корзине есть ,а количество = 0,
            //то удаляем этот товар
            unset($rsProducts[$i]);
        }
        $i++;
    }

    if (!$rsProducts) {
        echo "<h1>Корзина пуста!</h1>";
        return;
    }

    $_SESSION['saleCart'] = $rsProducts;

    $rsCategories = getAllMainCatsWithChildren();

    //hideLoginBox переменная - флаг для того чтобы спрятать блоки регистрации и логина
    //в боковой панели
    if (!isset($_SESSION['user'])) {
        $smarty->assign('hideLoginBox', 1);
    }

    $smarty->assign('pageTitle', 'Зaказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}

//ajax футкция сохраниения заказа
//@param array $_SESSION['saleCart'] массив покупаемых продуктов
// return json информация о результате выполнения

function saveorderAction() {
    //получаем массив покупаемых товаров
    $cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
    //если корзина пуста, то формируем ответ с ошибкой, отдаем его в формате json
    //и выхолим из функции
    if (!$cart) {
        $resData['success'] = 0;
        $resData['message'] = "Нет товаров для заказа";
        echo json_encode($resData);
        return;
    }

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];

    //создаем новый заказ и получаем его по ID
    $orderId = makeNewOrder($name, $phone, $adress);

    //если заказ не создан , то выдаем ошибку и завершаем функцию
    if (!$orderId) {
        $resData['success'] = 0;
        $resData['message'] = "Ошибка создания заказа";
        echo json_encode($resData);
        return;
    }

    //сохраняем товары для созданного заказа
    $res = setPurchaseForOrder($orderId, $cart);

    //если успешно , то формируем ответ , удаляем переменные корзины
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = "Заказ сохранен";
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    }else {
        $resData['success'] = 0;
        $resData['message'] = "Ошибка внесения данных для заказа № {$orderId}";
    }
    echo json_encode($resData);
}

