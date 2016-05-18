/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

populate_dates();

$("#date_selector").on("click change", function () {

    populate_dates();

});

function populate_dates() {
    var date = $("#date_selector option:selected").val();
    if (date != "") {
        $.getJSON(window.location.href + "/date/" + date, function (result) {
            if (result) {
                var rows = "";
                var max_entries = result.schedules.length;
                for (var i = 0; i < max_entries; i++) {
                    var time = result.schedules[i]['time'];
                    var movie = result.schedules[i]['movie'];
                    var room = result.schedules[i]['room'];
                    var id = result.schedules[i]['id'];
                    rows += "<tr>" +
                            "<td>" + (i + 1) + "</td>" +
                            "<td>" + time + "</td>" +
                            "<td>" + movie + "</td>" +
                            "<td>" + room + "</td>" +
                            "<td class=\"text-right\"> <a href=\"javascript:void(0);\" class=\"remove\" data-id=\"" + id + "\"><i class=\"fa fa-trash fa-1x\" aria-hidden=\"true\"></i> Remove</a></td>" +
                            "</tr>";
                }
                $("#schedules tbody").html(rows);

                if (ajaxDeleteTableRow != undefined) {
                    ajaxDeleteTableRow.reinitializeListeners();
                }
            }
        });
    }
}

