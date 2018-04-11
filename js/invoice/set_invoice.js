/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {
    $("#commentForm").validate();

    if ($("#pagetype").val() == "rec") {
        //获取项目
        $("#pro_code").autocomplete({
            source: "../../modules/action/searchInvoice.php",
            minLength: 1,
            scrollHeight: 300,
            minChars: 0,
            height: 60,
            autoFocus: false,
            select: function (event, ui) {
                console.log(ui.item.data)
                ss = ui.item.data;
//                $.post('../../modules/action/searchPrjoectByCode.php', {text: ss}, function (data) {
                $("#id").val(ss["Id"]);
                $('#pro_code').val(ss["ProCode"]);
                $('#pro_name').val(ss["ProName"]);
                $("#unit_name").val(ss["UnitName"]);
                $("#amount").val(ss["Amount"]);
                $("#invoice_num").val(ss["InvoiceNum"]);
                $("#givetime").val(ss["GiveTime"]);
//                }, 'json');
            }
        });
    } else {
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
    }
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
    $('#invoice_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
    $('#invoice_date').data('datepicker');
    $('#receivedate').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
    $('#receivedate').data('datepicker');
    $('#givetime').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
    $('#givetime').data('datepicker');
});



