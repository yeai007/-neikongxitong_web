/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var param = "";
$(document).ready(function () {

    $(".s-menu-gurd >ul > li").click(tab);
    function tab() {
        var tab = $(this).attr("title");
        $("#" + tab).show().addClass('selected').siblings().hide().removeClass('selected');
        getData(tab);
    }

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
    toPage(1);
});
function toHavePage(tab) {
    $("#s_" + tab).addClass('selected').siblings().removeClass('selected');
    $("#" + tab).show().siblings().hide();
}
function toPage(tab, param) {
    $.post("../../modules/action/getMenuById.php", {id: tab}, function (data) {
        var obj = JSON.parse(data);
        if (obj.MenuParentId == 0) {
            $("#parent_menu").hide();
        } else {
            $("#parent_menu").show();
        }
        getData(obj.Id, param);
        resetPage(obj);

    });
}
function getData(tab, param) {
    $("#" + tab).append("<div class='loading_div'></div>");
    $.post("../../modules/action/getMenuById.php", {id: tab}, function (data) {
        var obj = JSON.parse(data);
        $.post(obj.Url, {param: param, mid: obj.MenuParentId, pid: tab}, function (shaw_data) {
            $("#" + tab).html(shaw_data);
        });
    });
}
function resetPage(obj) {
    if (obj.MenuLevel == 1) {
        param = param + "," + obj.Id;
        $.post("../../modules/action/getParentMenu.php", {id: param}, function (data) {
            $("#parent_menu").html(data);
            $("#s_" + obj.Id).addClass('selected').siblings().removeClass('selected');
            $("#" + obj.Id).show().siblings().hide();
        });
    } else {
        param = obj.Id;
        $.post("../../modules/action/getParentMenu.php", {id: param}, function (data) {
            $("#parent_menu").html(data);
            $("#s_" + obj.Id).addClass('selected').siblings().removeClass('selected');
            $("#" + obj.Id).show().siblings().hide().html('');
        });
    }

}
function toClose(show_page, close_page) {
    $("#s_" + show_page).addClass('selected').siblings().removeClass('selected');
    $("#" + show_page).show().siblings().hide();
    $("#s_" + close_page).hide();
//    $.post("../../modules/action/getParentMenu.php", {id: obj}, function (data) {
//        $("#parent_menu").html(data);
////        $("#s_" + obj).addClass('selected').siblings().removeClass('selected');
////        $("#" + obj).show().siblings().hide();
//
//    });
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
        } else {
            alert(obj.msg);
        }
    }
}
function toExport(obj) {
    $("#" + obj).tableExport(
            {
                consoleLog: true,
                type: 'excel',
                ignoreColumn: ['序号'],
                ignoreRow: []
            }
    );
}
