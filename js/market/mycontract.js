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
    getList();
});
$().ready(function () {
    $("#contract_customer_name").autocomplete({
        source: "../../modules/action/searchCustomer.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchCustomerByName.php', {text: ss}, function (data) {
                $('#contract_sub').val(data["CustomerContact"]);
            }, 'json');
        }
    });
    $("#commentForm").validate({
        submitHandler: function (form) {
            form.submit();
        }
    });
    getList();
// Initialization
    $('#contract_signdate').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
// Access instance of plugin
    $('#contract_signdate').data('datepicker');
    $('#writedate').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
// Access instance of plugin
    $('#writedate').data('datepicker');
});
function checkName() {
    $.post('../../modules/action/searchCustomerByName.php', {text: $('#customer_id').val()}, function (data) {
        $('#customercontact').val(data["CustomerContact"]);
    }, 'json');
}
function back()
{
    history.back();
}
function getList() {
    $.post('../../modules/action/getMyContractList.php', {}, function (data) {
        $('#list').html(data);
    });
}

//删除用户确认
function deleteThis(obj) {
    if (window.confirm("你确定删除此记录吗？")) {
        $.post('../../modules/action/actionContract.php', {type: "delete", id: obj}, function (data) {
            getList();
        });
        return true;
    } else {
        return false;
    }
}
