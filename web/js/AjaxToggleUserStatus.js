function AjaxToggleUserStatus(container, urlPattern, successCallback) {
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;

    this.initializeListeners();
}

AjaxToggleUserStatus.prototype.prepareUrl = function (element) {
    var id = $(element).data('id');
    return this.urlPattern.replace('{id}', id);
};

AjaxToggleUserStatus.prototype.initializeListeners = function () {
    var instance = this;

    $(this.container).find('.changeStatus')
        .on('click', function (e) {
            e.preventDefault();
    
            $.ajax({
                method: 'POST',
                url: instance.prepareUrl($(this)),
                dataType: "json",
                data: {
                    value: $(this).text()
                },
                success: function (data) {
                    instance.successCallback(data);
                }
            });
        });
};
