$(document).ready(function () {
    window.setTimeout(function () {
        //fadeTo untuk menghilang perlahan
        //slideUp setelah hilang form naik ke seperti semula
        $(".alert").fadeTo(2000, 0).slideUp(1000, function () {
            $(this).remove();
        });
    }, 2000);
});
