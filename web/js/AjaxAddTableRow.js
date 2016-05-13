function AjaxAddTableRow(container, urlPattern, successCallback) {
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;

    this.initializeListeners();
}


AjaxAddTableRow.prototype.initializeListeners = function () {
    var instance = this;

    $(this.container).find('addRow').on('submit', function (e) {
            
            console.log('am ajuns');
            $.ajax({
                method: 'POST',
                url: instance.prepareUrl($(this)),
                dataType: "json",
                success: function (data) {
                    instance.successCallback(data);
                }
            });
            
            e.preventDefault();
        });
};
