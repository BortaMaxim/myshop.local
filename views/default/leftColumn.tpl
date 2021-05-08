<style>
    .linkBasket{
        text-decoration: none;
        font-size: 20px;
        color: #303134;
    }
    .linkBasket:hover{
        color: red;
    }
    .cartItem{
        margin-left: 5px;
        font-weight: 700;
    }
    a{
        text-decoration: none;
        color: #303134;
    }
    .userBox a{
        color: #303134;
        margin-bottom: 10px;
        font-weight: 700;
        transition: all .2s ease-in-out;
    }
    .userBox a:first-child:hover{
        color: red;
        font-size: 20px;
    }
  .hideme{
      display: none;
  }
  .menuCaptionRegister{
      cursor: pointer;
  }
  .menuCaptionRegister:hover{
      color: red;
  }
  .registerBoxHidden{
      display: none;
  }

</style>

<div id="leftMenu">
    <div class="menu">
        <ul class="listMenu" style="padding: 20px; margin-top: ;" >
            <h2>Menu</h2>
            {foreach $rsCategories as $item}
                <a href="/?controller=category&id={$item['id']}">{$item['name']}</a><br>

                {if isset($item['children'])}
                    {foreach $item['children'] as $itemChild}
                        -<a href="/?controller=category&id={$itemChild['id']}">{$itemChild['name']}</a><br>
                    {/foreach}
                {/if}
            {/foreach}
        </ul>
    </div>

    {if isset($arUser)}

        <div id="userBox" class=" userBox">
            <a href="/user/" id="userLink">{$arUser['displayName']}</a><br>
            <a href="/user/logout/" class="btn btn-danger mt-3"  onclick="logout();">Выход</a>
        </div>

    {else}

        <div id="userBox" class="hideme userBox">
            <a href="#" id="userLink"></a><br>
            <a href="/user/logout/" class="btn btn-danger mt-3"  onclick="logout();">Выход</a>
        </div>

        {if !isset($hideLoginBox)}
            <div id="loginBox">
                <h3 class="menuCaption">Авторизация</h3>
                <input placeholder="Email"  class="form-control mt-2" type="email" id="loginEmail" name="loginEmail" value="">
                <input placeholder="Password" class="form-control mt-2" type="password" id="loginPassword" name="loginPassword" value="">
                <input type="submit"
                       id="loginSubmit"
                       class="btn btn-primary mt-2"
                       name="loginSubmit"
                       value="Войти"
                       onclick="login();"
                >
            </div>


            <div id="registerBox">
                <h3 class="menuCaptionRegister showHidden mt-5" onclick="showRegisterBox(); return false;">Регистрация</h3>
                <div class="registerBoxHidden">
                    <label for="email">Email</label>
                    <input placeholder="Email" type="text" id="email" name="email" value="" class="form-control">

                    <label for="password">Пароль</label>
                    <input placeholder="Password" type="password" id="pwd1" name="pwd1" value="" class="form-control">

                    <label  for="password">Повторить пароль</label>
                    <input placeholder="Reapeat Password" type="password" id="pwd2" name="pwd2" value="" class="form-control mb-3">
                    <input type="button" onclick="registerNewUser();" value="Регистрация" class="btn btn-primary mb-3">
                </div>
            </div>

     {/if}
{/if}

    <div class="menu_basket">
        <h4 class="menuCaption">Корзина:</h4>
        <a class="linkBasket" href="/cart/" title="Перейти в корзину">В корзине:</a>
        <span id="cartCntItems" class="cartItem">
            {if $cartCntItems > 0} {$cartCntItems} {else}пусто {/if}
        </span>
    </div>


</div>