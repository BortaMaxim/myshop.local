<style>
    .adminProducts{
        padding: 20px;
        width: 800px;
        margin-top: 20px;
        text-align: center;
    }
    .redactor{
        width: 1000px;
        margin: 20px auto;
    }
    h4{
        text-align: center;
    }
    img {
        width: 30px;
        height: 30px;
    }
</style>



<div class="col-9 adminProducts">
    <h2>Товар</h2>
    <input class="btn btn-primary" type="button" value="Сохранить в XML" onclick="createXML();"/>
    <div id="xml_place"></div>
    <hr>
    <span class="mb-3">Импорт</span>
    <form action="/admin/loadformxml/" method="post" enctype="multipart/form-data">
        <input class="btn btn-primary" type="file" name="filename"><br>
        <input class="btn btn-success mt-2" type="submit" value="Загрузить">
    </form>
    <hr>
    <label class="mt-3">Добавить продукт</label>
    <table class="table table-primary mt-3">
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Сохранить</th>
        </tr>
        <tr>
            <td>
                <input class="form-control" type="edit" id="newItemName" value="">
            </td>
            <td>
                <input class="form-control" type="edit" id="newItemPrice" value="">
            </td>
            <td>
                <select class="form-select"  id="newItemCatId">
                    <option value="0">Главная категория</option>
                    {foreach $rsCategories as $itemCat }
                        {if $itemCat['parent_id']}
                            <option value="{$itemCat['id']}">{$itemCat['name']}</option>
                        {/if}
                    {/foreach}
                </select>
            </td>
            <td>
                <textarea class="form-control"  id="newItemDesc"></textarea>
            </td>
            <td>
                <input type="button" class="btn btn-primary" value="Сохранить" onclick="addProduct();">
            </td>
        </tr>
    </table>
</div>

<h4>Редактировать</h4>
<table class="table table-primary mt-3 redactor">
    <tr>
        <th>№</th>
        <th>ID</th>
        <th>Название</th>
        <th>Цена</th>
        <th>Категории</th>
        <th>Описание</th>
        <th>Удалить</th>
        <th>Изображения</th>
        <th>Сохранить</th>
    </tr>
   {foreach $rsProducts as $item name=products}
        <tr>
            <td>{$smarty.foreach.products.iteration}</td>
            <td>{$item['id']}</td>
            <td>
                <input class="form-control" type="edit" id="itemName_{$item['id']}" value="{$item['name']}">
            </td>
            <td>
                <input class="form-control" type="edit" id="itemPrice_{$item['id']}" value="{$item['price']}">
            </td>
            <td>
                <select class="form-select"  id="itemCatId_{$item['id']}">
                    <option value="0">Главная категория</option>
                    {foreach $rsCategories as $itemCat}

                        <option value="{$itemCat['id']}" {if $item['category_id'] == $itemCat['id']} selected {/if}>{$itemCat['name']}</option>

                    {/foreach}
                </select>
            </td>
            <td>
                <textarea class="form-control"  id="itemDesc_{$item['id']}">
                    {$item['description']}
                </textarea>
            </td>
            <td>
                <input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status'] == 0} checked="checked" {/if}>
            </td>
            <td>
                {if $item['image']}
                    <img class="cart" src="/images/products/{$item['image']}" alt="{$item['name']}">
                {/if}
                <form action="/admin/upload/" method="post" enctype="multipart/form-data">
                    <input class="btn btn-info form-control" type="file" name="filename"><br>
                    <input type="hidden" name="itemId" value="{$item['id']}">
                    <input class="btn btn-success" type="submit" value="Загрузить"><br>
                </form>
            </td>
            <td>
                <input class="btn btn-success" type="button" value="Сохранить" onclick="updateProduct({$item['id']});">
            </td>
        </tr>
   {/foreach}
</table>