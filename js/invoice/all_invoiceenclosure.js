
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {

    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getList($("#pagetype").val());
    arr_page.splice(0, arr_page.length); //清空数组 
    arr_page[0] = new Array("../../modules/invoice/allInvoiceEnclosure.php", "发票附件列表", 0, '');
    var pages = "";
    for (var i = 0; i < arr_page.length; i++)
    {
        var last_page = "toLastPage()";
        pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
    }
    $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
});
$().ready(function () {
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getList($("#pagetype").val());
});
function back()
{
    history.back();
}

function getList(obj) {
    $.post('../../modules/invoice/action/getAllInvoiceEnclosure.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/invoice/action/actionInvoiceEnclosure.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
        });
        return true;
    } else {
        return false;
    }
}


function Print(url, name, page, type, id, pagetype) {
    $.post(url, {type: type, id: id, pagetype: pagetype}, function (data) {
        //$('#sub_page').html(data);
        conthtml = data; //获取当前页的html代码    
        startstr = "<!--start-->";//设置打印开始区域    
        endstr = "<!--end-->";//设置打印结束区域    
        prncont = conthtml.substr(conthtml.indexOf(startstr) + 12); //从开始代码向后取html    
        prncont = prncont.substring(0, prncont.indexOf(endstr)); //从结束代码向前取html    
        alert(prncont);
        //window.document.body.innerHTML = prncont;
        window.print();
    });
}