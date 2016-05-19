function AjaxAddTableRow(container, urlPattern, successCallback) {
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;

    this.initializeListeners();
}

AjaxAddTableRow.prototype.initializeListeners = function () {
    var instance = this;

    $(this.container).find('.addRow').submit(function (e) {
        var actionURL = $(this).attr("action");

        $.ajax({
            method: 'POST',
            url: actionURL,
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                instance.successCallback(data);
                if(deleteTableRowRefresh !== undefined){
                deleteTableRowRefresh.reinitializeListeners();
            }
              if(editTableRowRefresh !== undefined){
                editTableRowRefresh.reinitializeListeners();
            }

            }
        });

        e.preventDefault();
    });
}