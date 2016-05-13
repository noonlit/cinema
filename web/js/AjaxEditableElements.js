function AjaxEditableElements(container, urlPattern, successCallback) {
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;

    this.initializeListeners();
}

AjaxEditableElements.prototype.prepareUrl = function (element) {
    var id = $(element).data('id');
    return this.urlPattern.replace('{id}', id);
};

AjaxEditableElements.prototype.initializeListeners = function () {
    var instance = this;

    $(this.container).find('.editable')
            .on('click', function () {
                $(this).data('initial', $(this).text());
            })
            .on('blur', function (e) {
                e.preventDefault();
                // Check if changed
                if ($(this).data('initial') === $(this).text()) {
                    return false;
                }

                $.ajax({
                    method: 'POST',
                    url: instance.prepareUrl($(this)),
                    dataType: "json",
                    data: {
                        value: $(this).text(),
                        capacity: $(this).text(),
                    },
                    success: function (data) {
                        instance.successCallback(data);
                    }
                });
            });
};
