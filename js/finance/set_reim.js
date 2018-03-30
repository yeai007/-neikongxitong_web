/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$().ready(function () {
    //获取项目
    $("#reim_person").autocomplete({
        source: "../../modules/action/searchUser.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.data.split(";");
            $('#reim_person_id').val(ss[0]);
        }
    });
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
    $("#reim_type").change(function () {
        var ss = $(this).children('option:selected').val();
        $.post('../../modules/finance/action/getSub.php', {id: ss}, function (data) {
            $("#reim_sub").html(data);
        });
    });
    $('#writedate').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
    $('#writedate').data('datepicker');
    $.post('../../modules/finance/action/getSub.php', {id: $("#reim_type").children('option:selected').val(), sel: $("#reim_sub_a").val()}, function (data) {
        $("#reim_sub").html(data);
    });
});