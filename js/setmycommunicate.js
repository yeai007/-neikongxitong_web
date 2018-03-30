/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
                $('#customercontact').val(data["CustomerName"]);
            }, 'json');
        }
    });
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

