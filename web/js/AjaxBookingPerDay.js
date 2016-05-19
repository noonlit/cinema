
$("#date_selector").on("click", function (e) {
    e.preventDefault();
    populate_dates();
});

function populate_dates() {
    var date_id = $("#date_selector option:selected").val();
    console.log('Data e ' + date_id);
    var movie_id = $("#hour_selector").data('movie');
    
    if (date_id != "") {
        $.getJSON(window.location.href + "/" + date_id , function (result) {
            if (result) {
                var option = "";
                var max_entries = result.length;
                    for (var i = 0; i < max_entries; i++) {
                    var time = result[i].time;
                    option += "<option value=" + time + ">" + time + "</option>";
                }
                $("#hour_selector").html(option);
            }
        });
    }
}