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
                getApply();
            }, 'json');
        }
    });
//
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
                getApply();
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
    $.post('../../modules/invoice/action/getStudentsByProCode.php', {procode: $("#pro_code").val(), unitid: $("#unitid").val()}, function (data) {
        $("#AddSearchSourcePanel").html(data);
    });
});
function getApply()
{
    $.post('../../modules/action/searchApply.php', {procode: $("#pro_code").val(), unitid: $("#unitid").val()}, function (data) {
        $('#receive_amount').val(data["ReceiveAmount"]);
        $('#invoiced_amount').val(data["InvoicedAmount"]);
    }, 'json');
}
function SelectStudent(obj) {
    $.post('../../modules/invoice/action/getStudentsByProCode.php', {type: obj, procode: $("#pro_code").val(), unitid: $("#unitid").val()}, function (data) {
        $("#AddSearchSourcePanel").html(data);
        var d = dialog({
            title: '需开票学员名单',
            content: $("#AddSearchSourcePanel").html(),
            okValue: '确 定',
            ok: function () {
                var checked = [];
                var checked = [];
                var amount = 0;
                $('input:checkbox:checked').each(function () {
                    checked.push($(this).attr("id"));
                    amount = parseFloat(amount) + parseFloat($(this).val());
                });
                $("#this_amount").val(amount);
                $("#studentids").val(checked);
            },
            cancelValue: '取消',
            cancel: function () {}
        });
        d.show();
    });

}


