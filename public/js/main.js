/// SCRIPT KLIK OPEN MODAL VOUCHER DISKON

$("#voucher").on("click", function () {
    $(".modal-center").css("z-index", 1501);
    $("#modal1").css("z-index", -1500);
    var mitra = $("#tujuanPickup").val().length;
    var user = $("#alamat").val().length;

    if (mitra === 0 || user === 0) {
        swal("Mohon pilih tujuan pickup dan lokasi saya terlebih dahulu..");
        // alert("Mohon pilih tujuan pickup dan lokasi saya terlebih dahulu..");
    } else {
        $("#voucher").attr("data-toggle", "modal");

        var ongkir = $("#ongkir").val();
        var ongkirNum = parseInt(ongkir.replace(".", ""));

        // membuat fungsi diskon akan disable jika ongkir tidak mencapai min ongkir diskon
        $(".diskon-data").each(function () {
            $(this).toggleClass("disabled", ongkirNum < this.dataset.minongkir);
        });
    }

    // if (mitra === 0 || user === 0) {
    //     $(".modal-body").addClass("overlay");
    //     $("#text")
    //         .empty()
    //         .append(
    //             "<p class='text-overlay'><strong>Mohon pilih lokasi tujuan dan lokasi anda terlebih dahulu..</strong></p>"
    //         );
    //     $(".diskon-data").css("pointer-events", "none");
    //     $(".disc-persen").css("opacity", "0.4");
    // } else {
    //     $("#text").remove();
    //     $(".modal-body").removeClass("overlay");
    //     $(".diskon-data").css("pointer-events", "");
    //     $(".disc-persen").css("opacity", "1");
    //     $(".disc-persen").css("color", "white");
    //     // mengambil value ongkir
    //     var ongkir = $("#ongkir").val();
    //     var ongkirNum = parseInt(ongkir.replace(".", ""));

    //     // membuat fungsi diskon akan disable jika ongkir tidak mencapai min ongkir diskon
    //     $(".diskon-data").each(function () {
    //         $(this).toggleClass("disabled", ongkirNum < this.dataset.minongkir);
    //     });
    // }
});

/// SCRIPT PILIH VOUCHER DISKON

$(".diskon-data").click(function () {
    // menghapus class selected selain yang dipilih
    $(".diskon-data").not(this).removeClass("selected");
    //menambahkan class hided selain yang dipilih
    $(".icon-selected-discount").not(this).addClass("hided");
    //menambahkan class selected ke yang dipilih
    $(this).addClass("selected");
    //menghapus class hided pada tag img yang dipilih
    $("img", this).removeClass("hided");
    $("#alertDiscount").removeClass("hided-alert-discount");
    $("#discount").removeClass("hided");
    $("#diskon").addClass("diskon");
    $(".diskon").css("color", "#1cc88a");
    $(".diskon").css("font-weight", "500");

    //mengambil data attr
    id_diskon = $(this).attr("data-id");
    console.log(id_diskon);
    persen = $(this).attr("data-percentage");
    namadiskon = $(this).attr("data-name");

    document.getElementById("alertDiskon").innerHTML =
        "Selamat, anda berhasil mendapatkan diskon " + persen + "%";
    document.getElementById("diskon").value = namadiskon;
    document.getElementById("idDiskon").value = id_diskon;

    persenDesimal = ((persen / ongkir) * 100).toFixed(2);
    diskon = persenDesimal * ongkir;
    // if (diskon.length > 0) {
    document.getElementById("potonganDiskon").value = -diskon;
    // }
    hitungTotal();
});

/// Script Get Lat and Long When Select Option is Selected

$(" #tujuanPickup").on("change", function () {
    document.getElementById("potonganDiskon").value = 0;
    document.getElementById("diskon").value = "Gunakan Kode >";
    $(".diskon").css("color", "black");
    $(".diskon").css("font-weight", "400");
    $("#discount").addClass("hided");
    $(".diskon-data").removeClass("selected");
    $(".icon-selected-discount").addClass("hided");
    $("#alertDiscount").addClass("hided-alert-discount");
    // mendapatkan data length untuk membuat tombol lihat rute enable
    var subjectLength = $("#tujuanPickup").val().length;

    if (subjectLength > 0) {
        $("#btnRute").removeClass("disabled");
        $("#btnRute").addClass("active");
    } else {
        $("#btnRute").addClass("disabled");
        $("#btnRute").removeClass("active");
    }

    ltMitra = $(this).find(":selected").data("lat");
    lgMitra = $(this).find(":selected").data("lng");
    initMap();
});

// $("#voucher").click(function () {
//     $(".modal-center").css("z-index", 1501);
//     $("#modal1").css("z-index", -1500);
// });

$("#btnRute").click(function () {
    $(".modal-center").css("z-index", -1501);
    $("#modal1").css("z-index", 1500);
});

/// Script Show Input Request Order

if (document.getElementById("addOrder1").checked) {
    $("#reqOrder").show();
} else {
    $("#reqOrder").hide();
}

$(document).ready(function () {
    $(".basic-form .checkbox input:checkbox").on("click", function () {
        $(this).closest(".checkbox").find(".ch_for").toggle();
    });
});

/// Script Change Price if Additional Order is Checked

$("#addOrder1").on("click", function () {
    var $addOrder1Check = $("#addOrder1").is(":checked");

    var text = "0";
    if ($addOrder1Check) {
        // $("input:text").val(5000);
        text = "5000";
    } else if ($(this).not(":checked")) {
        text = "0";
    }
    // $('.addOrder').html(text);
    document.getElementById("biayarq").value = text;
    addOrder = parseInt(text);
    hitungTotal();
});

/// Script Delete Attr Readonly When Button My Location is Clicked

$(document).ready(function () {
    $("#btnAlamat").click(function () {
        document.getElementById("biayarq").value = 0;
        $("input[name='alamat']").removeAttr("readonly");
        $("#btnRute").removeClass("hided");
        $("#passwordHelpBlock").removeClass("hided");
        $(".loading-btn").removeClass("hided");
        //   $(".hitung-jarak").removeClass("hided");
        $(this).prop("disabled", true);
        $(".btn-txt").text("Mendapatkan lokasi...");

        setTimeout(() => {
            $(".loading-btn").addClass("hided");
            //  $(".hitung-jarak").addClass("hided");
            // $(this).prop("disabled", false);
            $(".btn-txt").text("LOKASI SAYA");
        }, 1000);
    });
});

$(document).ready(function () {
    $("#btnSubmit").click(function () {
        $(".loading-btna").removeClass("hided");

        $(".btn-txt1").text("Mohon menunggu..");

        setTimeout(() => {
            $(".loading-btna").addClass("hided");
            //  $(".hitung-jarak").addClass("hided");
            // $(this).prop("disabled", false);
            $(".btn-txt1").text("PESAN SEKARANG");
        }, 10000);
    });
});

/// GET LOCATION AND CHANGE TO ADRESS

function getLocation() {
    navigator.geolocation.getCurrentPosition(function (position) {
        var coordinates = position.coords;
        document.getElementById("lat").value = coordinates.latitude;
        document.getElementById("long").value = coordinates.longitude;
        latitude = coordinates.latitude;
        longitude = coordinates.longitude;
        initialize();
        initMap();
    });
}

function initialize() {
    var lat = latitude;
    var long = longitude;
    var latlng = {
        lat: lat,
        lng: long,
    };
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode(
        {
            location: latlng,
        },
        function (results, status) {
            if (status === "OK") {
                if (results[0]) {
                    rs = results[0].formatted_address;
                } else {
                    rs = "No results found";
                }
            } else {
                rs = "Geocoder failed due to: " + status;
            }
            document.getElementById("alamat").value = rs;
        }
    );
}

// Initialize and add the map
var map;

function initMap() {
    // Get Latitude Longitude Mitra
    var latMitra = parseFloat(ltMitra);
    var lngMitra = parseFloat(lgMitra);

    // Get Latitude Longitude User
    var ltUser = latitude;
    var lgUser = longitude;

    // The map, centered on Central Park
    const center = {
        lat: -1.716282,
        lng: 114.8779677,
    };
    const options = {
        zoom: 21,
        scaleControl: true,
        center: center,
    };

    map = new google.maps.Map(document.getElementById("map"), options);
    // Locations of landmarks

    const mitra = {
        lat: latMitra,
        lng: lngMitra,
    };
    const user = {
        lat: ltUser,
        lng: lgUser,
    };

    // The markers for The mitra and The user Collection
    var mk1 = new google.maps.Marker({
        position: mitra,
        map: map,
    });
    var mk2 = new google.maps.Marker({
        position: user,
        map: map,
    });
    let directionsService = new google.maps.DirectionsService();
    let directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map); // Existing map object displays directions
    // Create route from existing points used for markers
    const route = {
        origin: mitra,
        destination: user,
        travelMode: "DRIVING",
    };

    directionsService.route(route, function (response, status) {
        // anonymous function to capture directions
        if (status !== "OK") {
            window.alert(
                "Rute tidak dapat ditentukan, Silahkan pilih tujuan pickup " +
                    status
            );
            return;
        } else {
            directionsRenderer.setDirections(response); // Add route to the map
            var directionsData = response.routes[0].legs[0]; // Get data about the mapped route
            if (!directionsData) {
                window.alert("Rute tidak dapat ditentukan");
                return;
            } else {
                replace = directionsData.distance.text.replace(",", ".");

                document.getElementById("jarak1").value = replace;

                jarak = directionsData.distance.text;

                hitungOngkir();
            }
        }
    });
}

function hitungOngkir() {
    var jarak1 = jarak;
    jarak1 = jarak1.replace(",", ".");
    var explode = jarak1.split(" ", 1);
    var meter = parseFloat(explode) * 1000;
    var ongkir1 = meter * 2;

    if (ongkir1 < 5000) {
        ongkir1 = 5000;
    } else {
        biaya = ongkir1;
    }

    document.getElementById("ongkir").value = parseInt(biaya);

    ongkir = ongkir1;

    hitungTotal();
}

function hitungTotal() {
    var ongkir2 = parseInt(ongkir);

    if (isNaN(ongkir2)) {
        ongkir2 = 0;
    }
    if (isNaN(diskon)) {
        diskon = 0;
    }

    if (typeof addOrder == "undefined") {
        addOrder = 0;
    }
    // if (typeof diskon == "undefined") {
    //     addOrder = 0;
    // }

    totalOngkir = ongkir2 - diskon;
    total = totalOngkir + addOrder;
    document.getElementById("total").value = total;
}

function gotowhatsapp() {
    var ltuser = document.getElementById("ltuser").value;
    var lguser = document.getElementById("lguser").value;
    var ltmitra = document.getElementById("ltmitra").value;
    var lgmitra = document.getElementById("lgmitra").value;
    var name = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var detail = document.getElementById("detail").value;
    var nohp = document.getElementById("nohp").value;
    var reqorder = document.getElementById("reqorder").value;
    var jarak = document.getElementById("jarak").value;
    var ongkir = document.getElementById("ongkir").value;
    var biayarq = document.getElementById("biayarq").value;
    var total = document.getElementById("total").value;
    var namamitra = document.getElementById("namamitra").value;
    var potongandiskon = document.getElementById("potonganDiskon").value;

    // var lengthbrq = biayarq.length;
    // console.log(lengthbrq);

    var ongkir_string = ongkir.toString(),
        sisa = ongkir_string.length % 3,
        rupiah = ongkir_string.substr(0, sisa),
        ribuan = ongkir_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? "." : "";
        ongkira = rupiah + separator + ribuan.join(".");
    }

    if (biayarq.length > 1) {
        var biayarq_string = biayarq.toString(),
            sisa = biayarq_string.length % 3,
            rupiah = biayarq_string.substr(0, sisa),
            ribuan = biayarq_string.substr(sisa).match(/\d{3}/g);
        if (ribuan) {
            separator = sisa ? "." : "";
            biayarqa = rupiah + separator + ribuan.join(".");
        }
    } else {
        biayarqa = biayarq;
    }

    var total_string = total.toString(),
        sisa = total_string.length % 3,
        rupiah = total_string.substr(0, sisa),
        ribuan = total_string.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? "." : "";
        totala = rupiah + separator + ribuan.join(".");
    }

    var url =
        "https://wa.me/6285158580660?text=" +
        "Halo saya baru saja memesan jasa pengantaran" +
        " *Buntok Delivery* " +
        "dengan detail pesanan sebagai berikut :" +
        "%0a" +
        "%0a" +
        "Nama: " +
        name +
        "%0a" +
        "Detail Pesanan: " +
        detail +
        "%0a" +
        "%0a" +
        "Tujuan Pickup: " +
        namamitra +
        " (https://maps.google.com/?q=" +
        ltmitra +
        "," +
        lgmitra +
        ")" +
        "%0a" +
        "%0a" +
        "Tujuan Pengantaran: " +
        alamat +
        " (https://maps.google.com/?q=" +
        ltuser +
        "," +
        lguser +
        ")" +
        "%0a" +
        "%0a" +
        "Pesanan Tambahan: " +
        reqorder +
        "%0a" +
        "No HP: " +
        nohp +
        "%0a" +
        "%0a" +
        "Jarak: " +
        jarak +
        " Km" +
        "%0a" +
        "Ongkir Pengantaran: " +
        ongkira +
        "%0a" +
        "Biaya Pesanan Tambahan: " +
        biayarqa +
        "%0a" +
        "Potongan Diskon: " +
        "-" +
        potongandiskon +
        "%0a" +
        "*TOTAL BIAYA PENGANTARAN: " +
        totala +
        "*" +
        "%0a";

    var urls =
        "https://wa.me/6285158580660?text=" +
        "Halo saya baru saja memesan jasa pengantaran" +
        " *Buntok Delivery* " +
        "dengan detail pesanan sebagai berikut :" +
        "%0a" +
        "%0a" +
        "Nama: " +
        name +
        "%0a" +
        "Detail Pesanan: " +
        detail +
        "%0a" +
        "%0a" +
        "Tujuan Pickup: " +
        namamitra +
        " (https://maps.google.com/?q=" +
        ltmitra +
        "," +
        lgmitra +
        ")" +
        "%0a" +
        "%0a" +
        "Tujuan Pengantaran: " +
        alamat +
        " (https://maps.google.com/?q=" +
        ltuser +
        "," +
        lguser +
        ")" +
        "%0a" +
        "%0a" +
        "Pesanan Tambahan: " +
        reqorder +
        "%0a" +
        "No HP: " +
        nohp +
        "%0a" +
        "%0a" +
        "Jarak: " +
        jarak +
        " Km" +
        "%0a" +
        "Ongkir Pengantaran: " +
        ongkira +
        "%0a" +
        "Biaya Pesanan Tambahan: " +
        biayarqa +
        "%0a" +
        "*TOTAL BIAYA PENGANTARAN: " +
        totala +
        "*" +
        "%0a";

    if (potongandiskon == 0) {
        window.location.href = urls;
    } else {
        window.location.href = url;
    }
}
