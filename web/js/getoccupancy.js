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

$("#schedule_time_selector").on("click change", function () {
    updateTableBodyByTime();
});

function updateTableBody() {
    var room_id = $("#room_id_selector option:selected").val();
    var date_filter = $("#schedule_date_selector option:selected").val();
    var time_filter = $("#schedule_time_selector option:selected").val();
    var date_condition = "";
    if (room_id !== "") {
        $.getJSON(occupancy_index + "occupancy/room/" + room_id + '/schedule?format=json', function (result) {
            //console.log(result);
            if (result) {
                populate_dates(result);
                populate_times(result);
            }
        });
        GetHtmlTableValues(room_id,date_filter,time_filter);
    }
}

function GetHtmlTableValues(room_id,date_filter,time_filter) {
$.get( "occupancy/room/" + room_id + '/schedule?format=html&date=' + date_filter + '&time=' + time_filter, function (result) {
            if (result) {
                $(".container tbody").html(result);
            } else {
                $.get("occupancy/room/" + room_id + '/schedule?format=html&date=' + date_filter, function (result) {

                    $(".container tbody").html(result);
                });
            }
        });
}


function updateTableBodyByDate() {
    var room_id = $("#room_id_selector option:selected").val();
    var date_filter = $("#schedule_date_selector option:selected").val();
    var time_filter = $("#schedule_time_selector option:selected").val();
    //console.log(date_filter);
    if (room_id !== "") {
        $.getJSON(occupancy_index + "occupancy/room/" + room_id + '/schedule?format=json&date=' + date_filter, function (result) {
            populate_times(result);
        });
        GetHtmlTableValues(room_id,date_filter,time_filter);
    }
}

function updateTableBodyByTime() {
    var room_id = $("#room_id_selector option:selected").val();
    var date_filter = $("#schedule_date_selector option:selected").val();
    var time_filter = $("#schedule_time_selector option:selected").val();
    //console.log(date_filter);
    if (room_id !== "") {
        $.get(occupancy_index + "occupancy/room/" + room_id + '/schedule?format=html&date=' + date_filter + '&time=' + time_filter, function (result) {
            if (result) {
                $(".container tbody").html(result);
            }
        });
    }
}


function populate_dates(result) {
    var date_filter = $("#schedule_date_selector option:selected").val();
    var options = "<option value='all'>All</option>";
    var max_schedules = result.dates.length;
    if (max_schedules > 0) {
        for (var i = 0; i < max_schedules; i++) {
            var date = new Date(result.dates[i].date);
            var string = date.toDateString().split(" ");
            var value = result.dates[i].date;
            var selected = "";
            if (value === date_filter) {
                selected = "selected";
            }
            options += "<option value='" + value + "'" + selected + ">" + string[2] + " " + string[1] + "</option>";
        }
    } else {
        var options = "<option value=''>No schedules are available</option>";
    }
    $("#schedule_date_selector").html(options);
}

function populate_times(result) {

    var time_filter = $("#schedule_time_selector option:selected").val();
    var options = "<option value='all'>All</option>";
    var max_schedules = result.times.length;
    if (max_schedules > 0) {
        for (var i = 0; i < max_schedules; i++) {
            var value = result.times[i].time;
            var selected = "";
            if (value === time_filter) {
                selected = "selected";
            }
            options += "<option value='" + value + "'" + selected + ">" + value + "</option>";
        }
    } else {
        var options = "<option value=''>No schedules are available</option>";
    }
    $("#schedule_time_selector").html(options);
}
