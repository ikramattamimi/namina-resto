$(document).ready(function () {
    $("#search-bar").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#product-section div.col-lg-6").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) >
                -1)
        });
    });
});
