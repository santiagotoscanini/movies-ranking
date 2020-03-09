var cat = 0;
var pag = 1;
var txt = "";

function load() {
    $.ajax({
        url: "movies_pagination.php",
        data: {
            catId: cat,
            pag: pag,
            busqueda: txt
        },
        dataType: "html"
    }).done(function (resp) {
        $("#movies").html(resp);

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

    $(".genre-selected").click(function () {
        cat = $(this).attr("catId");
        pag=1;
        load();
    });

    $(".search-movie").keyup(function(event) {
        if($(".search-movie").is(":focus") && event.key == "Enter"){
            txt = $(".search-movie").val();
            pag=1;
            load();
        }
    });

    load();
});