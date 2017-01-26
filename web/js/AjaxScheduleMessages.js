function AjaxScheduleMessages(container, urlPattern, successCallback) {
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;

    this.initializeListeners();
}

AjaxScheduleMessages.prototype.initializeListeners = function () {
    var instance = this;

    $(this.container).find('.addMessage').submit(function (e) {
            var actionURL = $(this).attr("action");

            $.ajax({
                method: 'POST',
                url: actionURL,
                data: $(this).serialize(),
                dataType: "json",
                success: function (data) {
                     instance.successCallback(data);
                     
                }
            });
            
            e.preventDefault();
        });
};
