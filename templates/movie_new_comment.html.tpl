<div class="card" style="width: 900px; margin: 30px;">
    <div class="card-body">
        {if (isset($logged_user))}
            {if isset($user_comment["id"])}
                {if $user_comment.estado=='APROBADO'}
                    <h4 class="card-title">Sorry:</h4>
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <p class="card-text" style="padding-top: 5px;">You have already commented on this movie.</p>
                    </div>
                {elseif $user_comment.estado=='RECHAZADO'}
                    <h4 class="card-title">Sorry:</h4>
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <p class="card-text" style="padding-top: 5px;">Your comment was rejected.</p>
                    </div>
                {else}
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <p class="card-text" style="padding-top: 5px;">Your comment is pending.</p>
                    </div>
                {/if}
            {else}
                <form action="create_new_comment.php" method="POST">
                    <input type="hidden" name="movie_id" value={$movie.id}>
                    <h4 class="card-title">Add your comment:</h4>
                    <div style="margin-bottom: 30px;">
                        <h6 class="card-subtitle mb-2 text-muted" style="float: right; margin-left: 10px;">Points:
                            <input class="form-control" placeholder="" type="number" name="points" required>
                        </h6>
                    </div>
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <input class="form-control" placeholder="Comment..." type="text" name="comment" required>
                    </div>
                    <div style="float: right">
{*                        <a href="#" class="card-link" type="submit"*}
{*                           id="accept">Accept</a>*}
                        <input value="Enviar" type="submit"><br>
                    </div>
                </form>
            {/if}
        {else}
            <h4 class="card-title">Sorry:</h4>
            <div class="card-body"
                 style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                <p class="card-text" style="padding-top: 5px;">You must be logged in to comment.</p>
            </div>
        {/if}
    </div>
</div>
