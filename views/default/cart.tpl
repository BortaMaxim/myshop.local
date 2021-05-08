{*Корзина*}
<style>
    a{
        text-decoration: none;
        color: #303134;
    }
    a:hover{
        color: red;
    }
    .width{
        width: 150px;
    }
    .hideme{
        display: none;
    }
</style>
<h1>The Basket</h1>

{if  !$rsProducts}
В корзине пусто...

{else }
    <form action="/cart/order/" method="post">
        <h2 class="mt-5">Заказы</h2>
        <table class="table table-hover">
            <thead>
                <tr>
                    <td>№</td>
                    <td>наименивание</td>
                    <td>количество</td>
                    <td>цена</td>
                    <td>сумма</td>
                    <td>действие</td>
                </tr>
            </thead>
            {foreach $rsProducts as $item name=products}
                <tr>
                    <td>{$smarty.foreach.products.iteration}</td>
                    <td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
                    <td><input
                                type="text"
                                class="form-control width"
                                name="itemCnt_{$item['id']}"
                                id="itemCnt_{$item['id']}"
                                value="1"
                                onchange="conversionPrice({$item['id']});"
                        >
                    </td>
                    <td>
                        <span id="itemPrice_{$item['id']}" value="{$item['price']}">
                            {$item['price']}
                        </span>
                    </td>
                    <td>
                        <span id="itemRealPrice_{$item['id']}">
                            {$item['price']}
                        </span>
                    </td>
                    <td>
                        <a href="#"
                           class="btn btn-danger"
                        id="removeCart_{$item['id']}"
                        onclick="removeFromCart({$item['id']}); return false"
                        title="Удалить"
                        >
                            Удалить
                        </a>

                        <a href="#"
                           id="addCart_{$item['id']}"
                           class="btn btn-success hideme"
                           onclick="addToCart({$item['id']}); return false"
                           title="Востановить"
                        >
                            Востановить
                        </a>
                    </td>
                </tr>

            {/foreach}
        </table>
        <input
                type="submit"
                class="btn btn-success"
                value="Оформить заказ"
        >
    </form>
{/if}


