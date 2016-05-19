/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

populate_rooms();

$("#time").on("change", function () {

    populate_rooms();

});

$("#date").on("change", function () {

    populate_rooms();

});

function populate_rooms() {
    var date = $("#date").val();
    var time = $('#time').val();
    if (date !== "" && time !== "") {
        $.getJSON(window.location.href + "/" + date + "/" + time, function (result) {
            if (result) {                
                var options = "";                
                var maxEntries = result.rooms.length;                 
                for (var i = 0; i < maxEntries; i++) {                    
                    var room = result.rooms[i];                    
                    options += "<option value='" + room.id + "'>" + room.name + "</option>";             
                }
                $("#room").html(options);
            }
        });
    }
}