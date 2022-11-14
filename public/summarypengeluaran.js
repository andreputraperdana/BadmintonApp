


$(document).ready(function () {
    $(document).on("click", "#btn_simpanpengeluaran", function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           })

        $.ajax({
            type: "GET",
            url: "summarypengeluaran/",
            success: function (hasil) {
                console.log(hasil);
            },
        });
    });
});
