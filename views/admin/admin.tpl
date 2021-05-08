<style>
    .admin{
        width: 500px;
        height: auto;
        padding: 20px;
        margin: 20px 200px 100px 0;
        border-radius: 6px;
        box-shadow: 2px 2px 8px #7c7c7c;
    }
</style>

            <div class="col-9 admin">
                <div id="centerColumn">
                    <div id="blockNewCategory">
                        <h3>Новая категория</h3>

                        <div class="col-6 mt-5">
                            <input type="text" id="newCategoryName" class="form-control" name="newCategoryName" value="">
                        </div>

                        <h5 class="mt-5">Является подкатегорией для:</h5>

                        <div class="col-6">
                            <select  class="form-select" name="generalCatId" id="">
                                <option value="0">
                                    Главная категория
                                    {foreach $rsCategories as $item}
                                <option value="{$item['id']}">{$item['name']}</option>
                                {/foreach}
                                </option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 col-6 mt-3">
                            <input type="button"
                                   class="btn btn-success"
                                   onclick="newCategory();"
                                   value="Добавить категории">
                        </div>

                    </div>
                </div>
            </div>

