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
    
    arr_page[0] = new Array("../../modules/report/IncomeReport.php", "公司收入列表", 0, '');
    var pages = "";
    for (var i = 0; i < arr_page.length; i++)
    {
        var last_page = "toLastPage()";
        pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
    }
    $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
});
function back()
{
    history.back();
}

function getList(obj) {
    $.post('../../modules/report/action/getIncomeReport.php', {pagetype: obj}, function (data) {
        $('#list').html(data);
    });
}


