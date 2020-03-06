<div class="card" style="width: 600px; margin: 30px;">
    <div class="card-body">
        <h4 class="card-title">{$comment.titulo}</h4>
        <h5 class="card-subtitle mb-2 text-muted" style="float: left; margin-right: 10px">Points: {$comment.puntuacion}</h5>
        <div style="margin-bottom: 30px;">
            <h6 class="card-subtitle mb-2 text-muted" style="float: right; margin-left: 10px;">{$comment.alias}</h6>
        </div>
        <div class="card-body" style="background: #f3f3f3; border-radius: 3px; border-color: #e1e1e1; margin-top: 8px; margin-bottom: 10px;">
            <p class="card-text" style="padding-top: 5px;">{$comment.mensaje}</p>
        </div>
        <div style="float: right">
            <a href="accept_or_reject_comment.php?id={$comment.id}&status=APROBADO" class="card-link" id="accept">Accept</a>
            <a href="accept_or_reject_comment.php?id={$comment.id}&status=RECHAZADO" class="card-link" id="reject">Reject</a>
        </div>
    </div>
</div>