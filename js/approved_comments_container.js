var pag = 1;
var movie_id = 1;

function load() {
    $.ajax({
        url: "approved_comments_pagination.php",
        data: {
            movieId: movie_id,
            pag: pag
        },
        dataType: "html"
    }).done(function (resp) {
        $("#a_comments").html(resp);

        $("#previous").click(function () {
            pag--;
            load();
        });

        $("#next").click(function () {
            pag++;
            load();
        });

    }).fail(function () {
        alert("error al cargar la pagina");
    });
}

$(document).ready(function () {
    movie_id = $("#movie-id").val();
    load();
});