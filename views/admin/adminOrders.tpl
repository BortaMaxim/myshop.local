<style>
    h2{
        text-align: center;
    }
    .orders{
        width: 990px;
    }
</style>

<div class="col-9 orders">
    <h2>Заказы</h2>

    {if !$rsOrders}
        Нет заказов...
    {else}
    <table class="table table-striped table-hover mt-5 tableOrders">
        <tr>
            <th>№</th>
            <th>Действие</th>
            <th>ID заказа</th>
            <th>Статус</th>
            <th>Дата создания</th>
            <th>Дата оплаты</th>
            <th>Дополнительная информация</th>
            <th>Дата изменения заказа</th>
        </tr>

        {foreach $rsOrders as $item name=orders}
            <tr>
                <td>{$smarty.foreach.orders.iteration}</td>
                <td>
                    <a href="#" onclick="showAdminProducts('{$item['id']}'); return false">
                        Показать товар заказа
                    </a>
                </td>
                <td>{$item['id']}</td>
                <td>
                    <input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']} checked="checked" {/if} onclick="updateOrderStatus('{$item['id']}');">
                    Закрыть
                </td>
                <td>{$item['date_created']}</td>
                <td>
                    <input class="form-control" type="text" id="datePayment_{$item['id']}" value="{$item['date_payment']}">
                    <input class="btn btn-success mt-2" type="button" value="Сохранить" onclick="updateDatePayment('{$item['id']}');">
                </td>
                <td>{$item['comment']}</td>
                <td>{$item['date_modification']}</td>
            </tr>

            <tr id="purchaseForOrderId_{$item['id']}" class="hideme" >
                <td colspan="8">
                    {if $item['children']}
                        <table  class="table table-danger">
                            <tr>
                                <th>№</th>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Количество</th>
                            </tr>
                            {foreach $item['children'] as $itemChild name=products}
                                <tr>
                                    <td>{$smarty.foreach.products.iteration}</td>
                                    <td>{$itemChild['id']}</td>
                                    <td><a href="/product/{$itemChild['id']}/">{$itemChild['name']}</a></td>
                                    <td>{$itemChild['price']}</td>
                                    <td>{$itemChild['amount']}</td>
                                </tr>
                            {/foreach}
                        </table>
                    {/if}
            </td>
            </tr>
        {/foreach}
    </table>
</div>
{/if}