<?php
    include_once '../config/db.php';
//Модель таблицы продуктов (products)


//получаем последние добавленные товары
//function getLastProducts__($limit = null) {
//    global $db;
//
//    $sql = "SELECT *
//            FROM `products`
//            ORDER BY id DESC";
//
//    if ($limit) {
//        $sql.= " LIMIT {$limit}";
//    }
//    $rs = mysqli_query($db, $sql);
//
//    return createSmartyRsArray($rs);
//}

function getLastProducts( $limit = null) {
    global $db;

    $sql = "SELECT * 
            FROM `products` 
            ORDER BY id DESC";

    if ($limit) {
        $sql .= "LIMIT {$limit}";
    }
    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}


//получение продуктов для категории $itemId
function getProductsByCat($itemId) {
    global $db;
    $itemId = intval($itemId);
    $sql = "SELECT * 
            FROM `products`
            WHERE category_id={$itemId}";

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}

//получить данные продукта по ID
function getProductById($itemId) {
    global $db;
    $itemId = intval($itemId);
    $sql = "SELECT *
            FROM `products`
            WHERE id={$itemId}";

    $rs = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($rs);
}

//получить продуктов из масства индентификатороф (ID)
//@param  array $itemsIds массив индентификаторов продуктов
//@return array массив данных продуктов

function getProductsFromArray($itemsIds) {
    global $db;

    $strIds = implode($itemsIds, ', ');
    $sql = "SELECT *
            FROM `products`
            WHERE id = {$strIds}";
    
    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}


function getProducts() {
    global $db;

    $sql = "SELECT * 
            FROM `products`
            ORDER BY category_id";

    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}


/*
 * добавление нового товара
 * @param string $itemName название продукта
 * @param integer $itemPrice цена продукта
 * @param string $itemDesc описание продукта
 * @param integer $itemCat ID категории
 * @return type
 * */
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat) {
    global $db;

    $sql = "INSERT INTO products
            SET
            `name` = '{$itemName}',
            `price` = '{$itemPrice}',
            `description` = '{$itemDesc}',
            `category_id` = '{$itemCat}'";

    $rs = mysqli_query($db, $sql);

    return $rs;
}

function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = null) {
    global  $db;

    $set = array();

    if ($itemName) {
        $set[] = "`name` = '{$itemName}'";
    }
    if ($itemPrice > 0) {
        $set[] = "`price` = '{$itemPrice}'";
    }
    if ($itemStatus !== null) {
        $set[] = "`status` = '{$itemStatus}'";
    }
    if ($itemDesc) {
        $set[] = "`description` = '{$itemDesc}'";
    }
    if ($itemCat) {
        $set[] = "`category_id` = '{$itemCat}'";
    }
    if ($newFileName) {
        $set[] = "`image` = '{$newFileName}'";
    }

    $setStr = implode(", ", $set);
    $sql = "UPDATE products
            SET {$setStr}
            WHERE id = '{$itemId}'";

    $rs = mysqli_query($db, $sql);
    return $rs;
}

function updateProductImage($itemId, $newFileName) {
    $rs = updateProduct($itemId, null, null, null, null, null, $newFileName);
    return $rs;
}


function insertImportProducts($aProducts){
    global $db;

    if (! is_array($aProducts)) return false;

    $sql = "INSERT INTO products
            (`name`, `category_id`, `description`, `price`, `status`)
            VALUES
            ";

    $cnt = count($aProducts);

    for ($i = 0; $i < $cnt; $i++) {
        if ($i > 0) $sql .= ', ';
        $sql .= "('" . implode("', '", $aProducts[$i]) . "')";
    }


    $rs = mysqli_query($db, $sql);
    return $rs;
}


