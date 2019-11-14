window.onscroll = function () {
    var top = document.body.scrollTop || document.documentElement.scrollTop;
    // console.log(top)

    var box = document.getElementById("headerContent");
    // this.console.log(box)
    var logo = document.getElementById("logo");
    var headerTotal = document.getElementById("headerTotal");
    // var goTop=document.getElementByClassName("goTop")
    // console.log(goTop)
    if (top >= 1080) {
        box.style.backgroundColor = "#031c36";
        box.style.position = 'fixed'
        box.style.top = "0px"
        box.style.left = "0px"
        // box.style.top='0'+px
        logo.style.display = 'none'
        headerTotal.style.position = 'absolute'
        // goTop.style.position='fixed'
        // goTop.style.top=0+'px'

        // 返回顶部
        let goTop = document.getElementById('goTop')
        goTop.style.display = "block"

        // console.log(goTop);
        var timer = null;
        goTop.onclick = function () {
            cancelAnimationFrame(timer);
            //获取当前毫秒数
            var startTime = +new Date();
            //获取当前页面的滚动高度
            var b = document.body.scrollTop || document.documentElement.scrollTop;
            var d = 500;
            var c = b;
            timer = requestAnimationFrame(function func() {
                var t = d - Math.max(0, startTime - (+new Date()) + d);
                document.documentElement.scrollTop = document.body.scrollTop = t * (-c) / d + b;
                timer = requestAnimationFrame(func);
                if (t == d) {
                    cancelAnimationFrame(timer);
                }
            });
        }
    } else if (top < 1080) {
        box.style.backgroundColor = "";
        logo.style.display = 'block'
        box.style.position = ''
        headerTotal.style.position = ''

        // 返回顶部样式
        let goTop = document.getElementById('goTop')
        goTop.style.display = "none"
    }


};

//招商政策详情,查看详情
var home_module = (function () {
    var show_detail = function show_detail(objthis) {
        var mobile_phone = $(objthis).attr('mobile-phone');
        var url = $(objthis).attr('data-url');
        var login_url = $(objthis).attr('login_url');
        var data_id = $(objthis).attr('data-id');
        if (mobile_phone == undefined || mobile_phone == 'undefined' || mobile_phone == '') {
            //location.href = login_url;
            window.open(login_url);
        } else {
            location.href = url;
        }
    };
    return {
        show_detail: show_detail,
    };
})();