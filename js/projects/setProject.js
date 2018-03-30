/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$().ready(function () {
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
    $('#project_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });

// Access instance of plugin
    $('#project_date').data('datepicker');
});