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
    var date_id = $("#date_selector option:selected").val();
    if (date_id != "") {
        $.getJSON(window.location.href + "/date/" + date_id, function (result) {
            if (result) {
                var rows = "";
                var max_entries = result.schedules.length;
                for (var i = 0; i < max_entries; i++) {
                    var time = result.schedules[i]['time'];
                    var movie = result.schedules[i]['movie'];
                    rows += "<tr>" + "<td>" + (i + 1) + "</td>" + "<td>" + time + "</td>" + "<td>" + movie + "</td>" + "</tr>";
                }
                $("#schedules tbody").html(rows);
            }
        });
    }
}