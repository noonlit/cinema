function AjaxAddTableRow(container, urlPattern, successCallback) {
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;

    this.initializeListeners();
}
var lastIndex = window.location.href.lastIndexOf("/");
var addUrl = window.location.href.substring(0, lastIndex)+"/add";

console.log(addUrl);

AjaxAddTableRow.prototype.initializeListeners = function () {
    var instance = this;

    $(this.container).find('.addRow').on('submit', function (e) {
            
            console.log('am ajuns');
            console.log($("#genreName").val())
            $.ajax({
                method: 'POST',
                url: addUrl,
                dataType: "json",
                success: function (data) {
                    instance.successCallback(data);
                }
            });
            
            e.preventDefault();
        });
};
