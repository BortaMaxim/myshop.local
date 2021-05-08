<?php
include_once '../config/db.php';
//Модель таблицы пользователей (users)
function registerNewUser($email, $pwdMD5, $name, $phone, $adress) {

    global $db;

    $email = htmlspecialchars(mysqli_real_escape_string($db, $email));
    $name = htmlspecialchars(mysqli_real_escape_string($db, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($db, $phone));
    $adress = htmlspecialchars(mysqli_real_escape_string($db, $adress));


    $sql = "INSERT INTO
            users(`email`, `pwd`, `name`, `phone`, `adress`)
            VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";



    $rs = mysqli_query($db, $sql);

    if ($rs) {
        $sql = "SELECT * FROM users
                WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}')
                LIMIT 1";


        $rs = mysqli_query($db, $sql);
        $rs = createSmartyRsArray($rs);

        if (isset($rs[0])) {
            $rs['success'] = 1;
        }else{
            $rs['success'] = 0;
        }
    }else{
        $rs['success'] = 0;
    }

    return $rs;

}

//Проверка параметров для регистрации пользователя
//@param string $email email
//@param string $pwd1 пароль
//@param string $pwd2 повтор пароля
//@return array результат

function checkRegisterParams($email, $pwd1, $pwd2) {
    $res = null;

    if (!$email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }
    if (!$pwd1) {
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }
    if (!$pwd2) {
        $res['success'] = false;
        $res['message'] = 'повторите пароль';
    }
    if ($pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = 'пароли не совпадают';
    }
    return $res;
}


//Проверка почты (усть ли email в БД)

function checkUserEmail($email) {

    global $db;

    $email = mysqli_real_escape_string($db, $email);
    $sql = "SELECT id FROM users WHERE email = '{$email}'";



    $rs = mysqli_query($db, $sql);
    $rs = createSmartyRsArray($rs);


    return $rs ;
}

//Авторизация пользователя

function loginUser($email, $pwd) {
    global $db;

    $email = htmlspecialchars(mysqli_real_escape_string($db, $email));
    $pwd = md5($pwd);



    $sql = "SELECT * FROM users
                WHERE (`email` = '{$email}' and `pwd` = '{$pwd}')
                LIMIT 1";


    $rs = mysqli_query($db, $sql);
    $rs = createSmartyRsArray($rs);
    if (isset($rs[0])) {
        $rs['success'] = 1;
    }else {
        $rs['success'] = 0;
    }

    return $rs;
}

//Изменение данных пользователя
function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd) {
    global $db;

    $email = htmlspecialchars(mysqli_real_escape_string($db, $_SESSION['user']['email']));
    $name = htmlspecialchars(mysqli_real_escape_string($db, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($db, $phone));
    $adress = htmlspecialchars(mysqli_real_escape_string($db, $adress));
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);

    $newPwd = null;
    if ($pwd1 && ($pwd1 = $pwd2)) {
        $newPwd = md5($pwd1);
    }

    $sql = "UPDATE users SET";

    if ($newPwd) {
        $sql .= "`pwd` = '{$newPwd}', ";
    }

    $sql .= "`name` = '{$name}',
            `phone` = '{$phone}',
            `adress` = '{$adress}'
            WHERE 
            `email` = '{$email}' AND `pwd` = '{$curPwd}'
            LIMIT  1";

    $rs = mysqli_query($db, $sql);

    return $rs;
}

//получить данные текущего пользователя
//@return array массив заказов с привязкой к продуктам
function getCurUserOrders() {
    $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
    $rs = getOrdersWithProductsByUser($userId);

    return $rs;
}