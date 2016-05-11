$(document).ready(function () {
    console.info('Hey Robin, You like to look under the Hood?');
    var $this = $(this);


//    $('.editable').on('click', function() {
//        
//        var $id = $(this).data('id'),
//            $value = $(this).text(),
//            $this = $(this);
//
//        $(this).on('blur', function (e) {
//            e.preventDefault();
//            
//            if( $value == $this.text())
//                return false;
//            
//            $.ajax({
//                url: "edit/" + $id + "/" + $value,
//                dataType: "json",
//
//                success: function (data) {
//                    swal({   title: data.title,   text: data.message,   type: data.type,   confirmButtonText: "Cool" });                
//                }
//            });
//        });        
//    });


});

var is_empty = function(str) {
	return (!str || 0 === str.length);
};