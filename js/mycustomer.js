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
    getCustomerList();
    arr_page.splice(0, arr_page.length); //清空数组 
    arr_page[0] = new Array("../../modules/market/myCustomer.php", "我的客户信息", 0, '');
    var pages = "";
    for (var i = 0; i < arr_page.length; i++)
    {
        var last_page = "toLastPage()";
        pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
    }
    $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
});
//客户级别选择检索
$('#customerlevel').change(function () {
    $.post('../../modules/action/getMyCustomer.php', {Customerlevel: $(this).children('option:selected').val()}, function (data) {
        $('#list').html(data);
    });
})
//客户单位层次选择检索
$('#PerformanceLevel').change(function () {
    $.post('../../modules/action/getMyCustomer.php', {PerformanceLevel: $(this).children('option:selected').val()}, function (data) {
        $('#list').html(data);
    });
})
function back()
{
    history.back();
}
function getCustomerList() {
    $.post('../../modules/action/getMyCustomer.php', {}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function CommandConfirm(obj) {
    if (window.confirm("你确定删除此客户吗？")) {
        $.post('../../modules/action/setCustomerClass.php', {type: "delete", id: obj}, function (data) {
            getCustomerList();
        });
        return true;
    } else {
        return false;
    }
}
