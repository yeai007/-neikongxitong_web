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
    getCommunicateList();
    arr_page.splice(0, arr_page.length); //清空数组 
    
    arr_page[0] = new Array("../../modules/market/allCommunicateRecord.php", "全部沟通记录", 0, '');
    var pages = "";
    for (var i = 0; i < arr_page.length; i++)
    {
        var last_page = "toLastPage()";
        pages = "<li class='li_top_title' style='margin-left:10px;' onclick=\"" + last_page + "\">" + arr_page[i][1] + "</li>";
    }
    $("#title_page").html("<ul class='ul_top_title'>" + pages + "</ul>");
});
$().ready(function () {
    $("#customer_name").autocomplete({
        source: "../../modules/action/searchCustomer.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchCustomerByName.php', {text: ss}, function (data) {
                $('#customercontact').val(data);
            }, 'json');
        }
    });
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getCommunicateList();
// Initialization
    $('#communicate_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
// Access instance of plugin
    $('#communicate_date').data('datepicker');
});
function checkName() {
    $.post('../../modules/action/searchCustomerByName.php', {text: $('#customer_id').val()}, function (data) {
        $('#customercontact').val(data["CustomerContact"]);
    }, 'json');
}
;
//客户级别选择检索
$('#customerlevel').change(function () {
    $.post('../../modules/action/getCustomerList.php', {Customerlevel: $(this).children('option:selected').val()}, function (data) {
        $('#list').html(data);
    });
})
//客户单位层次选择检索
$('#PerformanceLevel').change(function () {
    $.post('../../modules/action/getCustomerList.php', {PerformanceLevel: $(this).children('option:selected').val()}, function (data) {
        $('#list').html(data);
    });
})
function back()
{
    history.back();
}
function getCommunicateList() {
    $.post('../../modules/action/getAllCommunicateList.php', {}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/action/actionMyCommunicate.php', {type: "delete", id: obj}, function (data) {
            getCommunicateList();
        });
        return true;
    } else {
        return false;
    }
}
