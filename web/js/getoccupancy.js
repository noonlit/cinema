/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var pathArray = window.location.href.split( '/' );
var secondLevelLocation = pathArray[0];
var newPathname = "";
for (i = 0; i < pathArray.length; i++) {
  
  if (pathArray[i]==="index_dev.php") {
      break;
  }
  newPathname += pathArray[i];
  newPathname += "/";
}

console.log(newPathname);

$("#room_id_selector").on("change", function () {

    var room_id = $("#room_id_selector option:selected").val();
    if (room_id != "") {

        $.getJSON(newPathname+"index_dev.php/admin/room/" + room_id + '/schedule', function (result) {
            console.log(result);
            if (result) {
                var options = "";
                var max_schedules = result.current_room.length;
                for (var i = 0; i < max_schedules; i++) {
                    console.log(result.current_room[i]);
                    var value = result.current_room[i].date+" "+result.current_room[i].time;
                    options +="<option value='"+value+"'>"+value+"</option>";
                }
                $("#date_selector").append(options);
            }
        });
    }

});