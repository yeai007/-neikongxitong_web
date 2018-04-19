
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {
    $("#commentForm").validate();
    //获取项目
    $("#pro_code").autocomplete({
        source: "../../modules/action/searchProject.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchPrjoectByCode.php', {text: ss}, function (data) {
                $('#pro_code').val(data["ProjectCode"]);
                $('#pro_name').val(data["ProjectYear"] + data["ProjectBatch"] + data["SubTrainingName"] + data["SubTypeName"]);
            }, 'json');
        }
    });
    //获取项目
    $("#invoice_num").autocomplete({
        source: "../../modules/action/searchApplyInvoice.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchPrjoectByCode.php', {text: ss}, function (data) {
                $('#pro_code').val(data["ProjectCode"]);
                $('#pro_name').val(data["ProjectYear"] + data["ProjectBatch"] + data["SubTrainingName"] + data["SubTypeName"]);
            }, 'json');
        }
    });
    $("#unit_name").autocomplete({
        source: "../../modules/action/searchCustomer.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchCustomerByName.php', {text: ss}, function (data) {
                $('#unit_name').val(data["CustomerName"]);
                $('#unitid').val(data["CustomerId"]);
            }, 'json');
        }
    });
    $('#write_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
    $('#write_date').data('datepicker');
    $.post('../../modules/invoice/action/getStudentsByProCode.php', {procode: $("#pro_code").val()}, function (data) {
        $("#AddSearchSourcePanel").html(data);
    });
});



