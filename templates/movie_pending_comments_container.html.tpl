{if (count($pending_comments) == 0)}
    <div class="card" style="border-color: rgba(0,0,0,0.55); width: 400px; margin: 30px">
        <div class="card-body" style="border-color: rgba(0,0,0,0.55)">
            No hay comentarios pendientes.
        </div>
    </div>
{else}
    <div class="cards-container">
        {foreach from=$pending_comments item=comment}
            {include file="movie_comment_request.html.tpl" comment=$comment}
        {/foreach}
    </div>
{/if}
<div class="buttons-container">
    <button type="button" class="btn btn-outline-info nav-button" id="previous" {if ($page<=1)}disabled{/if}>
        <i class="material-icons">&#xE5C4;</i>
    </button>
    Página {$page} de {$pages}
    <button type="button" class="btn btn-outline-info nav-button" id="next" {if ($page>=$pages)}disabled{/if}>
        <i class="material-icons">&#xE5C8;</i>
    </button>
</div>
