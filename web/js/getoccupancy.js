/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var last_index = window.location.href.lastIndexOf("occupancy");
var occupancy_index = window.location.href.substring(0, last_index);



$("#room_id_selector").on("click change", function () {
    updateTableBody();
});

$("#schedule_date_selector").on("click change", function () {
    updateTableBodyByDate();
});

function updateTableBody() {
    var room_id = $("#room_id_selector option:selected").val();
    if (room_id !== "") {
        $.getJSON(occupancy_index + "occupancy/room/" + room_id + '/schedule?format=json', function (result) {
            //console.log(result);
            if (result) {
                populate_dates(result);
            }
        });
        $.get(occupancy_index + "occupancy/room/" + room_id + '/schedule?format=html', function (result) {
            if (result) {
                $(".container tbody").html(result);
            }
        });
    }
}

function updateTableBodyByDate() {
    var room_id = $("#room_id_selector option:selected").val();
    var date_filter = $("#schedule_date_selector option:selected").val();
    console.log(date_filter);
    if (room_id !== "") {
        console.log(date_filter);
        $.get(occupancy_index + "occupancy/room/" + room_id + '/schedule?format=html&date='+date_filter, function (result) {
            if (result) {
                $(".container tbody").html(result);
            }
        });
    }
}


function populate_dates(result) {
    var options = "<option value='all'>All</option>";
    var max_schedules = result.current_room.length;
    console.log(max_schedules);
    if (max_schedules > 0) {
        for (var i = 0; i < max_schedules; i++) {
            var date = new Date(result.current_room[i].date);
            var string = date.toDateString().split(" ");
            var value = result.current_room[i].date;
            options += "<option value='" + value + "'>" + string[2]+" "+string[1] + "</option>";
        }
    } else {
        var options = "<option value=''>No schedules are available</option>";
    }
    $("#schedule_date_selector").html(options);
}

