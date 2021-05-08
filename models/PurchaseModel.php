<?php

include_once '../config/config.php';

//Модель для таблицы продукции (purchase)

//Внесение в DB данных продуктов с привязкой к заказу
//@param integer $orderId ID заказа
//@param array $cart массив корзины
//@return boolean TRUE в случае успешного добавления в БД

function setPurchaseForOrder($orderId, $cart) {
    global $db;

    $sql = "INSERT INTO purchase
            (order_id, product_id, price, amount)
            VALUES ";

    $values = array();
    //формируем массив строк для  запроса дла каждого товара
    foreach ($cart as $item) {
        $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }

    //преобразовываем массив в строку
    $sql .= implode(', ', $values);
    $rs = mysqli_query($db, $sql);

    return $rs;
}

function getPurchaseForOrder($orderId) {
    global $db;

    $sql = "SELECT `pe`.*, `ps`.`name`
            FROM purchase as `pe`
            JOIN products as `ps` ON `pe`.product_id = `ps`.id
            WHERE `pe`.order_id = {$orderId}";

    $rs = mysqli_query($db, $sql);
    return createSmartyRsArray($rs);
}