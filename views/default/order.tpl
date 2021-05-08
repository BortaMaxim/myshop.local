{*Страница заказа*}

<h2>Данные заказа</h2>
<form id="frmOrder" action="/cart/saveorder/" method="post">

<table class="table table-danger mt-5">
    <thead>
        <tr>
            <td>№</td>
            <td>Найменование</td>
            <td>Количество</td>
            <td>Цена</td>
            <td>Сумма</td>
        </tr>
    </thead>
    {foreach $rsProducts as $item name=products}
        <tr>
            <td>{$smarty.foreach.products.iteration}</td>
            <td><a href="/product/{$item['id']}/" target="_blank">{$item['name']}</a></td>
            <td>
                <span id="itemCnt_{$item['id']}">
                    <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}">
                    {$item['cnt']}
                </span>
            </td>
            <td>
                <span id="itemPrice_{$item['id']}">
                    <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}">
                    {$item['price']}
                </span>
            </td>
            <td>
                <span id="itemRealPrice_{$item['id']}">
                    <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}">
                    {$item['realPrice']}
                </span>
            </td>
        </tr>
    {/foreach}
</table>

{if isset($arUser)}
    {$buttonClass = ""}
    <h2>Данные заказчика</h2>
    <div id="orderUserInfoBox" {$buttonClass}>
        {$name = $arUser['name']}
        {$phone = $arUser['phone']}
        {$adress = $arUser['adress']}

        <table class="table table-danger mt-5">
            <tr>
                <td>Имя*</td>
                <td><input class="form-control" type="text" id="name" name="name" value="{$name}"></td>
            </tr>
            <tr>
                <td>Тел*</td>
                <td><input class="form-control" type="text" id="phone" name="phone" value="{$phone}"></td>
            </tr>
            <tr>
                <td>Адрес*</td>
                <td><textarea class="form-control" id="adress" name="adress" value="{$adress}"></textarea></td>
            </tr>
        </table>
    </div>
{else}
    <div id="loginBox" class="row">
        <h3 class="menuCaption">Авторизация</h3>
          <table class="table table-danger">
                <tr>
                    <td>Логин</td>
                    <td>
                        <input class="form-control mt-2" type="email" id="loginEmail" name="loginEmail" value="">
                    </td>
                </tr>
                <tr>
                    <td>Пароль</td>
                    <td>
                        <input class="form-control mt-2" type="password" id="loginPassword" name="loginPassword" value="">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn btn-primary" type="button" value="Войти" onclick="login();">
                    </td>
                </tr>
          </table>
    </div>

    <div id="registerBox">
        <h2 class="menuCaption">Регистрация нового пользователя: </h2>

        <label for="email">Email*</label>
        <input type="text" id="email" name="email" value="" class="form-control">

        <label for="password">Пароль*</label>
        <input type="password" id="pwd1" name="pwd1" value="" class="form-control">

        <label for="password">Повторить пароль*</label>
        <input type="password" id="pwd2" name="pwd2" value="" class="form-control mb-3">

        Имя*: <input class="form-control" type="text" id="name" name="name" value=""><br>
        Телефон*: <input class="form-control" type="text" id="phone" name="phone" value=""><br>
        Адрес*: <textarea class="form-control" name="adress" id="adress"></textarea><br>

        <input type="button" onclick="registerNewUser();" value="Регистрация" class="btn btn-primary mb-3">
    </div>

    {$buttonClass = "class='hideme'"}
{/if}

    <input
            {$buttonClass}
            class="btn btn-success"
            id="btnSaveOrder"
            type="button"
            value="Оформить заказ"
            onclick="saveOrder();"
    />
</form>
