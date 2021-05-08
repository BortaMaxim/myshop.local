{*страница категорий*}
<style>
    .card{
        box-shadow: 2px 2px 5px black;
        padding: 10px;
        transition: all .2s ease;
    }
    .card:hover{
        box-shadow: 5px 5px 10px black;
    }
    .products{
        padding: 100px 0;
    }
    .categoryTitle{
        margin-bottom: 60px;
        text-align: center;
    }
    .notProdutcs{
        margin-top: 100px;
    }
    .title{
        text-align: center;
        margin-top: 50px;
    }
</style>

<h2 class="title">Товары категории{$rsCategory['name']}</h2>

{if $rsProducts || $rsChildCats}
    <div class="container-fluid">
        <div class="row products">
            {foreach $rsProducts as $item name=products}
                        <div class="card " style="width: 17rem; margin: 5px; padding: 10px;">
                            <a href="/product/{$item['id']}/">
                                <img src="/images/products/{$item['image']}" alt="{$item['name']}" width="100%" height="200px">
                            </a>
                            <a href="/product/{$item['id']}/">{$item['name']}</a>
                        </div>
            {/foreach}

            <div class="categoryTitle">
                {foreach $rsChildCats as $item name=childCats}
                    <h2><a href="/category/{$item['id']}/">{$item['name']}</a></h2>
                {/foreach}
            </div>
        </div>
    </div>
{else}
    <div class="notProdutcs">
        <h2 style="color: red"><ins>Товаров нет...</ins></h2>
    </div>

{/if}