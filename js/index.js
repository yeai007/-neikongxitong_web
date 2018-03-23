/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



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
function toPage(obj1, name) {
    $.post(obj1, {}, function (data) {
        $('#right').html(data);
    });
}
function back()
{
    history.back();
}
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

var arr_page = [];
var last_type = "";
function toSubPage(url, name, page, type, id, pagetype) {
    if (!isHavePage(arr_page, name)) {
        arr_page.push(new Array(url, name, page, type));
    }
    pages = "";
    for (var i = 0; i < arr_page.length; i++)
    {
        if (i == 0) {
            var last_page = "toLastPage()";
            pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
        } else {
            var last_page = "toSubPage('" + arr_page[i][0] + "','" + arr_page[i][1] + "','" + arr_page[i][2] + "','" + arr_page[i][3] + "')";
            pages = pages + "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
        }
    }
    $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
    $("#main_page").hide();
    if ($("#sub_page").is(":hidden"))
    {
        if (last_type == type) {
            $("#sub_page").show();
        } else
        {
            $.post(url, {type: type, id: id, pagetype: pagetype}, function (data) {
                $('#sub_page').html(data);
            });
            last_type = type;
            $("#sub_page").show();
        }

    } else {
        if (last_type == type) {
            if ($("#sub_page").html() == null || $("#sub_page").html().length == 0)
            {
                $.post(url, {type: type, id: id, pagetype: pagetype}, function (data) {
                    $('#sub_page').html(data);
                });
            } else {
                $("#sub_page").show();
            }
        } else
        {
            $.post(url, {type: type, id: id, pagetype: pagetype}, function (data) {
                $('#sub_page').html(data);
            });
            last_type = type;
        }
    }
}
function toLastPage() {
    $("#sub_page").hide();
    if ($("#main_page").is(":hidden"))
    {
        $("#main_page").show();
    } else {
        if ($("#main_page").html() == null || $("#main_page").html().length == 0)
        {
            $.post("../../modules/market/allcustomer.php", {}, function (data) {
                $('#right').html(data);
            });
        } else {
            $("#main_page").show();
        }
    }
}
function isHavePage(arr_page, name) {
    var isHave = false;
    for (var i = 0; i < arr_page.length; i++)
    {
        if (arr_page[i][1] == name)
        {
            isHave = true;
        }
    }
    return isHave;
}