function AjaxEditableDoubleColumns(mappings, container, urlPattern, successCallback) {
    this.mappings=mappings;
    this.container = container;
    this.urlPattern = urlPattern;
    this.successCallback = successCallback;
    this.initializeListeners();
}

AjaxEditableDoubleColumns.prototype.prepareUrl = function (element) {
    var id = $(element).data('id');
    return this.urlPattern.replace('{id}', id);
};

AjaxEditableDoubleColumns.prototype.initializeListeners = function () {
    var instance = this;
console.log($(this.container).find('.editable'));
    $(this.container).find('.editable')
            .on('click', function () {
                $(this).data('initial', $(this).text());
            })
            
            .on('blur', function (e) {
                // Check if changed
                if ($(this).data('initial') === $(this).text()) {
                    return false;
                }
                
                var data=instance.prepareData($(this));
                $.ajax({
                    method: 'POST',
                    url: instance.prepareUrl($(this)),
                    dataType: "json",
                    data: data,
                    success: function (data) {
                        instance.successCallback(data);
                    }
                });
            });

};

AjaxEditableDoubleColumns.prototype.prepareData= function(element){
    var parent = element.parent('tr');
    var data = {};
    for(mapClass in this.mappings){
        var mapField = this.mappings[mapClass];
        data[mapField] = parent.find('.'+mapClass).text()
    }
    return data;
};
