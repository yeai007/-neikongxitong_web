/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var arr = [];
var arr_page = [];
$(document).ready(function () {
    $('.inactive').click(function () {
        var className = $(this).parents('li').parents().attr('class');
        if ($(this).siblings('ul').css('display') == 'none') {
            if (className == "yiji") {
                $(this).parents('li').siblings('li').children('ul').parent('li').children('a').removeClass('inactives');
                $(this).parents('li').siblings('li').children('ul').slideUp(100);
                $(this).parents('li').children('ul').children('li').children('ul').parent('li').children('a').removeClass('inactives');
                $(this).parents('li').children('ul').children('li').children('ul').slideUp(100);
            }
            $(this).addClass('inactives');
            $(this).siblings('ul').slideDown(100);
        } else {
            $(this).removeClass('inactives');
            $(this).siblings('ul').slideUp(100);
        }
    });
    $('.inactive').on({
        mouseout: function () {
            $(this).css("background-color", "rgba(248, 248, 248, 1)");
        },
        mouseover: function () {
            $(this).css("background-color", "#E9E9E4");
        }
    });
});
function toPage(obj1, name, type, page, parent_page, data) {
    if (type == 1) {
        $.post(obj1, {data: data}, function (data) {
            $('#right').html(data);
        });
    } else if (type == 0) {
        arr_page.splice(0, arr_page.length); //清空数组 
        arr_page[0] = new Array(name, obj1, type, page);
        if ($("#" + page).is(":hidden"))
        {
            $("#" + page).show();
        } else {
            if ($("#" + page).html() == null || $("#" + page).html().length == 0)
            {
                $.post(obj1, {data: data}, function (data) {
                    $('#right').html(data);
                });
            } else {
                $("#" + page).show();
            }
        }
        if (!isHavePage(arr_page, name)) {
            arr_page.push(new Array(name, obj1, type, page));
        }
        var pages = '';
        for (var i = 0; i < arr_page.length; i++)
        {
            if (pages == "") {
                var last_page = "toPage('" + arr_page[i][1] + "','" + arr_page[i][0] + "'," + arr_page[i][2] + "','" + arr_page[i][3] + "')";
                pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][0] + "</li>";
            } else {
                var last_page = "toPage('" + arr_page[i][1] + "','" + arr_page[i][0] + "'," + arr_page[i][2] + "','" + arr_page[i][3] + "')";
                pages = pages + "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][0] + "</li>";
            }
        }
        alert(pages);
    } else {
        $("#" + parent_page).hide();
        if ($("#" + page).is(":hidden"))
        {
            $("#" + page).show();
        } else {
            if ($("#" + page).html() == null || $("#" + page).html().length == 0)
            {
                $.post(obj1, {data: data}, function (data) {
                    $("#" + page).html(data);
                });
            } else {

                $("#" + page).show();
            }
        }
        if (!isHavePage(arr_page, name)) {
            arr_page.push(new Array(name, obj1, type));
        }
        var pages = '';
        for (var i = 0; i < arr_page.length; i++)
        {
            if (pages == "") {
                var last_page = "toPage('" + arr_page[i][1] + "','" + arr_page[i][0] + "'," + arr_page[i][2] + ",'" + arr_page[i][3] + "')";
                pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][0] + "</li>";
            } else {
                var last_page = "toPage('" + arr_page[i][1] + "','" + arr_page[i][0] + "'," + arr_page[i][2] + ",'" + arr_page[i][3] + "')";
                pages = pages + "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][0] + "</li>";
            }
        }
        alert(pages);
    }
    if (type == 1) {
        $("#title_page").html("");
    } else
    {
        $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
    }

}
function back()
{
    history.back();
}
//function changeFrameHeight() {
//    var ifm = document.getElementById("BoardRight");
//    ifm.height = document.documentElement.clientHeight;
//
//}
//window.onresize = function () {
//    changeFrameHeight();
//} 
function iframeLoad(iframe) {
    var doc = iframe.contentWindow.document;
    var html = doc.body.innerHTML;
    if (html != '') {
//将获取到的json数据转为json对象
        var obj = eval("(" + html + ")");
        //判断返回的状态
        if (obj.status < 1) {
            alert(obj.msg);
            back();
        } else {
            alert(obj.msg);
            // window.location.href = "http://www.baidu.com";
        }
    }
}
function isHavePage(arr_page, name) {
    var isHave = false;
    for (var i = 0; i < arr_page.length; i++)
    {
        if (arr_page[i][0] == name)
        {
            isHave = true;
        }
    }
    return isHave;
}