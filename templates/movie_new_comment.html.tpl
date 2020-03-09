<div class="card" style="width: 900px; margin: 30px;">
    <div class="card-body">
        {if (isset($logged_user))}
            {if isset($user_comment["id"])}
                {if $user_comment.estado=='APROBADO'}
                    <h4 class="card-title">Lo sentimos:</h4>
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <p class="card-text" style="padding-top: 5px;">Ya has comentado esta película.</p>
                    </div>
                {elseif $user_comment.estado=='RECHAZADO'}
                    <h4 class="card-title">Lo sentimos:</h4>
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <p class="card-text" style="padding-top: 5px;">Tu comentario ha sido denegado.</p>
                    </div>
                {else}
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <p class="card-text" style="padding-top: 5px;">Tu comentario esta pendiente a sea aprobado.</p>
                    </div>
                {/if}
            {else}
                <form action="create_new_comment.php" method="POST">
                    <input type="hidden" name="movie_id" value={$movie.id}>
                    <h4 class="card-title">Agrega tu comentario:</h4>
                    <div style="margin-bottom: 30px;">
                        <h6 class="card-subtitle mb-2 text-muted" style="float: right; margin-left: 10px;">
                            <label for="exampleFormControlSelect1">Puntuación:</label>
                            <select required class="form-control" id="points" name="points">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </h6>
                    </div>
                    <div class="card-body"
                         style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                        <input class="form-control" placeholder="Comentar..." type="text" name="comment" required>
                    </div>
                    <div style="float: right">
                        <button type="submit" class="btn btn-primary btn-save">Aceptar</button>
                    </div>
                </form>
            {/if}
        {else}
            <h4 class="card-title">Lo sentimos:</h4>
            <div class="card-body"
                 style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
                <p class="card-text" style="padding-top: 5px;">Debes estar registrado para poder comentar.</p>
            </div>
        {/if}
    </div>
</div>
