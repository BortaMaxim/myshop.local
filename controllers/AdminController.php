<?php
//AdminController.php

//Контроллер бэкенда сайти (/admin/)

//Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty) {

    $rsCategories = getAllMainCategories();


    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}

function addNewCatAction() {
    $catName = $_POST['newCategoryName'];
    $catParentId = $_POST['generalCatId'];

    $res = insertCat($catName, $catParentId);


    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = "Категория добавлена";
    }else{
        $resData['success'] = 0;
        $resData['message'] = "Ошибка добавления категории";
    }

    echo json_encode($resData);

}

//Страница управления категориями
//@param type array
function categoryAction($smarty) {
    $rsCategories = getAllCategories();
    $rsMainCategories = getAllMainCategories();



    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsMainCategories', $rsMainCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

function updatecategoryAction() {
    $itemId = $_POST['itemId'];
    $parentId = $_POST['parentId'];
    $newName = $_POST['newName'];

    $res = updateCategoryData($itemId, $parentId, $newName);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = "Категория добавлена";
    }else {
        $resData['success'] = 0;
        $resData['message'] = "Ошибка изменении данных категории";
    }

    echo json_encode($resData);

}

//страница управлением товара
//@param type $smarty

function productsAction($smarty) {
    $rsCategories = getAllCategories();
    $rsProducts = getProducts();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

function addproductAction() {

    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCatId'];


    $res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = "Изменения успешно внесены";
    }else{
        $resData['success'] = 0;
        $resData['message'] = "Ошибка измениения данных";
    }

    echo json_encode($resData);

}

function updateproductAction() {

    $itemId = $_POST['itemId'];
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemStatus = $_POST['itemStatus'];
    $itemDesc = $_POST['itemDesc'];
    $itemCat = $_POST['itemCatId'];

    $res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = "Изменения успешно внесены";
    }else{
        $resData['success'] = 0;
        $resData['message'] = "Ошибка изменения данных";
    }

   echo json_encode($resData);

}

function uploadAction() {

    $maxSize = 2 * 1024 * 1024;

    $itemId = $_POST['itemId'];

    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

    $newFileName = $itemId . '.' . $ext;

    if ($_FILES['filename']['size'] > $maxSize) {
        echo "Файл слишком большой";
        return;
    }

    if (is_uploaded_file($_FILES['filename']['tmp_name'])){
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/images/products/{$newFileName}");
        if ($res) {
            $res = updateProductImage($itemId, $newFileName);
            if ($res) {
                redirect('/admin/products/');
            }
        }
    }else{
        echo "Ошибка загрузки файла";
    }
}

function ordersAction($smarty) {

    $rsOrders = getOrders();

    $smarty->assign('rsOrders', $rsOrders);
    $smarty->assign('pageTitle', 'Заказы' );

    loadTemplate($smarty, "adminHeader");
    loadTemplate($smarty, "adminOrders");
    loadTemplate($smarty, "adminFooter");
}

function setorderstatusAction() {
    $itemId = $_POST['itemId'];
    $status = $_POST['status'];

    $res = updateOrderStatus($itemId, $status);

    if ($res) {
        $resData['success'] = 1;
    }else{
        $resData['success'] = 0;
        $resData['message'] = "Ошибка установки статуса";
    }

    echo json_encode($resData);

}

function setorderdatepaymentAction() {
    $itemId = $_POST['itemId'];
    $datePayment = $_POST['datePayment'];

    $res = updateOrderDatePayment($itemId, $datePayment);

    if ($res) {
        $resData['success'] = 1;
    }else{
        $resData['success'] = 0;
        $resData['message'] = "Ошибка установки статуса";
    }

    echo json_encode($resData);
}

function createxmlAction() {
    $rsProducts = getProducts();

    $xml = new DOMDocument('1.0', 'utf-8');
    $xmpProducts = $xml->appendChild($xml->createElement('products'));

    foreach ($rsProducts as $product){
        $xmpProduct = $xmpProducts->appendChild($xml->createElement('product'));

        foreach($product as $key => $val) {
            $xmlName = $xmpProduct->appendChild($xml->createElement($key));
            $xmlName->appendChild($xml->createTextNode($val));
        }
    }

    $xml->save($_SERVER['DOCUMENT_ROOT'] . '/xml/products.xml');

    echo 'OK';
}

function uploadFile($localFileName, $localPath = '/upload/') {

    $maxSize = 2 * 1024 * 1024;

    //получаем рассширение загружаемого файла
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

    $pathInfo = pathinfo($localFileName);
    if ($ext != $pathInfo['extension']) return false;

    $newFileName = $pathInfo['filename'] . '_' . time() . '.' . $pathInfo['extension'];

    if ($_FILES['filename']['size'] > $maxSize) {
        return false;
    }

    $path = $_SERVER['DOCUMENT_ROOT'] . $localPath;
    if (!file_exists($path)) {
        mkdir($path);
    }

    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $path .  $newFileName);
        return ($res == true) ? $newFileName : false;
    }else{
        return false;
    }
}


function loadformxmlAction() {
    $successUploadFileName = uploadFile( 'import_products.xml', '/xml/import/');

    if (!$successUploadFileName) {
        echo "Ошибка загрузки файла";
    }

    $xmlFile = $_SERVER['DOCUMENT_ROOT']."/xml/import/".$successUploadFileName;
    $xmlProducts = simplexml_load_file($xmlFile);


    $products = array();
    $i = 0;
    foreach($xmlProducts as $product) {

        $products[$i]['name'] = htmlentities($product->name);
        $products[$i]['category_id'] = intval($product->category_id);
        $products[$i]['description'] = htmlentities($product->description, ENT_QUOTES | ENT_IGNORE, "UTF-8");
        $products[$i]['price'] = intval($product->price);
        $products[$i]['status'] = intval($product->status);
        $i++;
    }

    $res = insertImportProducts($products);

    if ($res) {
        redirect('/admin/products/');
    }
}