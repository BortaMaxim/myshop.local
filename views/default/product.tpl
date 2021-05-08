{*страница проукта*}

<style>
    img {
        margin: 30px 50px;
        width: 500px;
        height: 300px;
    }
    .decripton{
        margin-top: 20px;
    }
    .product_content{
        box-shadow: 2px 2px 6px #7c7c7c;
        padding: 20px;
        border-radius: 10px ;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    h3 {
        margin-left: 50px;
    }
    .addToBasket{
        margin: 20px 0 100px 50px;
        display: inline-block;
    }

    .basket{
        background-color: #cd1212;
        padding: 10px 30px;
        color: #bec3cb;
        text-decoration: none;
        box-shadow: 2px 2px 6px #303134;
        transition: all .2s ease-in-out;
        font-weight: 700;
    }
    .basket:hover{
        background-color: #f60404;
        color: #9af607;
    }


   .basket.green{
        background-color: #78b518;
        color: black;
        transition: all .2s ease-in-out;
    }
    .green:hover{
        background-color: #9dff04;
        color: black;
    }
    .hideme{
        display: none;
    }
    a{
        color: #303134;
        text-decoration: none;
    }
    a:hover{
        color: red;
    }
</style>
<h3>{$rsProduct['name']}</h3>

<div class="product_content">
    <img src="/images/products/{$rsProduct['image']}" alt="{$rsProduct['name']}">

    <div>
        <h4>Стоимость: {$rsProduct['price']} <strong>$</strong></h4>
        <div class="decripton">
            <h4>Описания:</h4>{$rsProduct['description']}
        </div>
    </div>
</div>

<div class="addToBasket">
    <a
       id="removeCart_{$rsProduct['id']}"
       {if !$itemInCart}class="basket hideme" {/if}
       href="#"
       onclick="removeFromCart({$rsProduct['id']}); return false;"
       alt="Удалить из корзины"
    >
        Удалить из корзины
    </a>

    <a
       id="addCart_{$rsProduct['id']}"
       {if $itemInCart}class="basket green hideme" {/if}
       href="#"
       onclick="addToCart({$rsProduct['id']}); return false;"
       alt="Добавить в корзину"
    >
        Добавить в корзину
    </a>
</div>


