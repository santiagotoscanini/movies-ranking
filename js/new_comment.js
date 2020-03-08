var comment = "";
var points = 0.0;
var movie_id = 1;

function load() {
    $.ajax({
        type:"POST",
        url: "create_new_comment.php",
        data: {
            movieId: movie_id,
            comment: comment,
            points: points
        },
        dataType: "html",
        success: function (resp) {
            alert(resp);
        },
        fail: function () {
            alert("error al cargar la pagina")
        }
    })
}

$(document).ready(function () {
    $("#send-comment").click(function () {
        comment = $("#new-comment").val();
        points = $("#new-comment-points").val();
        movie_id = $("#movie-id").val();
        load();
    });
});