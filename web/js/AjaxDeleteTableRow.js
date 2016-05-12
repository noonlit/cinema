function AjaxDeleteTableRow(container, urlPattern, successCallback) {
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;

    this.initializeListeners();
}

AjaxDeleteTableRow.prototype.prepareUrl = function (element) {
    var id = $(element).data('id');
    return this.urlPattern.replace('{id}', id);
};

AjaxDeleteTableRow.prototype.initializeListeners = function () {
    var instance = this;

    $(this.container).find('.remove')
        .on('click', function (e) {
            e.preventDefault();
            var row = $(this).parent().parent();
            $.ajax({
                method: 'GET',
                url: instance.prepareUrl($(this)),
                dataType: "json",
              
                success: function (data) {
                    instance.successCallback(data);
                    row.fadeOut();
                }
            });
        });
};