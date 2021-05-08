<?php
include_once '../config/db.php';

//модели для таблиц (categories)

//Получить дочерние категории для категории $catId
function getChildrenForCat($catId) {
    global $db;

    $sql = "SELECT * 
            FROM `categories`  
            WHERE parent_id = '{$catId}'";
    $rs = mysqli_query($db, $sql);

    return createSmartyRsArray($rs);
}


//Получить главные категории с пивязкой дочерних категорий
function getAllMainCatsWithChildren() {
    global $db;

    $sql = "SELECT * 
            FROM `categories`  
            WHERE parent_id = 0";


    $rs = mysqli_query($db, $sql);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)){

        $rsChildren = getChildrenForCat($row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
        }
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

//получить данные категории по id
function getCatById($catId) {
    global $db;
    $catId = intval($catId);

    $sql = "SELECT * 
            FROM `categories`
            WHERE id='{$catId}'";

    $rs = mysqli_query($db, $sql);

    return mysqli_fetch_assoc($rs);
}

//получить все главные категорий (категории которые не являются дочерними)
//@return array массив категорий
function getAllMainCategories() {
    global $db;
    $sql = "SELECT * 
            FROM categories
            WHERE parent_id = 0";


    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}

/*
 * добавление новой категории
 * @param string $catName название категории
 * @param integer $catParentId ID родительской категории
 * @return integer id новой категории
 * */

function insertCat($catName, $catParentId = 0) {

    global $db;
    $sql = "INSERT INTO 
            categories (`parent_id`, `name`)
            VALUES ('{$catParentId}', '{$catName}')";


     mysqli_query($db, $sql);
    //получаем id добавленой записи
    $id = mysqli_insert_id($db);

    return $id ;
}

//плучить все категории
//@return array массив категорий
function getAllCategories() {

    global $db;

    $sql = "SELECT *
            FROM categories
            ORDER BY parent_id ASC ";

    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}

/*
 * Обновления категорий
 * @param integer $itemId ID категорий
 * @param integer $parentId ID главной категории
 * @param string $newName новое имя категории
 * @return type
 * */
function updateCategoryData($itemId, $parentId = -1, $newName = '') {
    global $db;
    $set = array();

    if ($newName) {
        $set[] = "`name` = '{$newName}'";
    }
    if ($parentId > -1) {
        $set[] = "`parent_id` = '{$parentId}'";
    }
    $setStr = implode(", ", $set);
    $sql = "UPDATE categories
            SET {$setStr}
            WHERE id = '{$itemId}'";

    $rs = mysqli_query($db, $sql);
    return $rs;
}

