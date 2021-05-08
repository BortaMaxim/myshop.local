{*Шаблон главной страницы*}
<style>
    .card{
        box-shadow: 2px 2px 5px black;
        padding: 10px;
        transition: all .2s ease;
    }
    .card:hover{
        box-shadow: 5px 5px 10px black;
    }

</style>

<div class="container-fluid ">
    <div class="row justify-content-center text-white mb-100 ">
        {foreach $rsProducts as $item  name=products}
            <div class="card card-demo text-white " style="width: 17rem; margin: 5px; padding: 10px;">
                <a href="/product/{$item['id']}/">
                    <img src="/images/products/{$item['image']}" alt="{$item['name']}" width="100%" height="200px">
                </a>
                <a href="/product/{$item['id']}/">{$item['name']}</a>
            </div>
        {/foreach}
    </div>

</div>





