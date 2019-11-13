var baseUrl = 'http://172.26.2.215:8089';
function user_logout(objthis){

    //var url = $(objthis).attr('data-url');
    var url = baseUrl + '/api/huser/goOut';;
    var url2 = $(objthis).attr('location_url');
    var tokens = $(objthis).attr('data-token');
    $.ajax({
        type: "post",
        url: url,
        data: '',
        headers: {
            "Content-Type": "application/json",
            "Authorization":tokens
        },
        dataType: 'json',
        success: function (ret) {
            if(ret){

            }
        },
        error: function (data) {
            layer.msg(data)
        }
    });
}

//$(function (){
//    var url = baseUrl + '/api/front/cPersonalInfo/getInfo';
//    var token = $('#data_token').val();
//    $.ajax({
//        type: "get",
//        url: url,
//        data: '',
//        headers: {
//            "Content-Type": "application/json",
//            "Authorization":token
//        },
//        dataType: 'json',
//        success: function (ret) {
//
//        },
//        error: function (data) {
//            layer.msg(data)
//        }
//    });
//});