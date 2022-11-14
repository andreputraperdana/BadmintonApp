const buttonUMKM = document.querySelector("#btnUmkm");
const buttonPemasok = document.querySelector("#btnPemasok");
const overlay = document.querySelector(".overlay");
const notification = document.querySelector(".notif_success");

$(document).ready(function () {
    $(document).on("click", "#tombolDaftar", function (e) {
        e.preventDefault();

        var hasil = {
            username: $(".username").val(),
            password: $(".password").val(),
            roleid: $("#roleid").val(),
        };

        console.log(hasil);
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/register",
            data: hasil,
            dataType: "json",
            success: function (response) {
                console.log(response.stats);
                if (response.stats) {
                    overlay.classList.remove("hidden");
                    notification.classList.remove("hidden");
                }
            },
        });
    });
});
