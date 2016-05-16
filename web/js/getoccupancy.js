/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var last_index = window.location.href.lastIndexOf("occupancy");
var occupancy_index = window.location.href.substring(0, last_index);

$("#room_id_selector").on("click change", function () {
    populate_dates();
});

function populate_dates() {
    var room_id = $("#room_id_selector option:selected").val();
    if (room_id !== "") {

        $.getJSON(occupancy_index + "occupancy/room/" + room_id + '/schedule', function (result) {
            console.log(result);
            if (result) {
                var options = "";
                var max_schedules = result.current_room.length;
                console.log(max_schedules);
                if (max_schedules > 0) {
                    for (var i = 0; i < max_schedules; i++) {
                        console.log(result.current_room[i]);
                        var value = result.current_room[i].date + " " + result.current_room[i].time;
                        options += "<option value='" + value + "'>" + value + "</option>";
                    }
                } else {
                    var options = "<option value=''>No schedules are available</option>";
                }
                $("#date_selector").html(options);
            }
        });
    }
}