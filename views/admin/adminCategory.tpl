<style>
    .catTitle{
        text-align: center;
        margin-bottom: 50px;
    }
    .category{
        margin-top: 20px;
        padding: 20px;
        margin-bottom: 100px;

    }

</style>

<div class="col-9 category">
    <div class="container">
        <h2 class="catTitle">Категории</h2>
        <table class="table table-success">
            <tr>
                <th>№</th>
                <th>ID</th>
                <th>Название</th>
                <th>Родительская категория</th>
                <th>Действие</th>
            </tr>
            {foreach $rsCategories as $item name=categories}
                <tr>
                    <td>{$smarty.foreach.categories.iteration}</td>
                    <td>{$item['id']}</td>
                    <td>
                        <input class="form-control" type="edit" id="itemName_{$item['id']}" value="{$item['name']}">
                    </td>
                    <td>
                        <select class="form-select"  id="parentId_{$item['id']}">
                            <option value="0">
                                Главная категория
                                {foreach $rsMainCategories as $mainItem}
                            <option value="{$mainItem['id']}" {if $item['parent_id'] == $mainItem['id']} selected {/if}>
                                {$mainItem['name']}
                            </option>
                            {/foreach}
                            </option>
                        </select>
                    </td>
                    <td>
                        <input class="btn btn-success" type="button" value="Сохранить" onclick="updateCat({$item['id']});">
                    </td>
                </tr>
            {/foreach}
        </table>
    </div>
</div>
