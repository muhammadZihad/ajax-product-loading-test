function ajaxProductLoad(button) {
    let type = $(button).data('producttype');
    $.ajax(ajaxLoadUrl, {
        type: 'GET',  // http method
        dataType: 'json',
        data: { type: type, limit: 6 },  // data to submi
        success: function (data, status, xhr) {
            ajaxProductLoaded(button, data);
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log(errorMessage);
        }
    });
}


function ajaxProductLoaded(dom, data) {
    $(dom).parent().html(data.data.html)
}


$(function() {
    $('.has-ajax-load-data').trigger('click');
});
