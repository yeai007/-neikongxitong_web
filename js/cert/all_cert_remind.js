/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    //getList($("#pagetype").val());
    arr_page.splice(0, arr_page.length); //清空数组 
    arr_page[0] = new Array("../../modules/cert/allCert.php", "证书到期列表", 0, '');
    var pages = "";
    for (var i = 0; i < arr_page.length; i++)
    {
        var last_page = "toLastPage()";
        pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
    }
    $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
    $("select#isremind").change(function () {
        console.log($(this).children('option:selected').val() + $(this).children('option:selected').text());
        $.post('../../modules/cert/action/actionCert.php', {
            type: "remind",
            id: $(this).children('option:selected').val(),
            sel: $(this).children('option:selected').text()
        }, function (data) {
            alert(data);
        });
    });
});
function back()
{
    history.back();
}
function getList(obj) {
    $.post('../../modules/cert/action/getAllCertRemind.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}
//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/cert/action/actionCertRemind.php', {type: "delete", id: obj}, function (data) {
            getList($("#pagetype").val());
        });
        return true;
    } else {
        return false;
    }
}


