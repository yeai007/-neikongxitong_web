/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {
    $("#project_code").autocomplete({
        source: "../../modules/action/searchProject.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchPrjoectByCode.php', {text: ss}, function (data) {
                $('#project_code').val(data["ProjectCode"]);
                $('#project_name').val(data["ProjectYear"] + data["ProjectBatch"] + data["SubTrainingName"] + data["SubTypeName"]);
                $("#project_type").val(data["ProjectType"]);
                $("#sub_training").val(data["SubTraining"]);
                $("#sub_type").val(data["SubType"]);
            }, 'json');
        }
    });
    $('#project_type').change(function (e) {
        var ss = $(this).children('option:selected').val();
        $.post('../../modules/project/action/getSubStraining.php', {parentid: ss}, function (data) {
            $('#sub_training').html(data);
        });
    });
    $('#sub_training').change(function (e) {
        var ss = $(this).children('option:selected').val();
        $.post('../../modules/project/action/getSubType.php', {parentid: ss}, function (data) {
            $('#sub_type').html(data);
        });
    });
    $('#write_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
    $('#write_date').data('datepicker');
});