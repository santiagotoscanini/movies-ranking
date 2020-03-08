var pag = 1;

function load() {
    $.ajax({
        url: "pending_comments_pagination.php",
        data: {
            pag: pag
        },
        dataType: "html"
    }).done(function (resp) {
        $("#comments-container").html(resp);

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
    load();
});