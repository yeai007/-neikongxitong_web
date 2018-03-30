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
                $("#project_type").val(data["ProjectType"]);
                $("#sub_training").val(data["SubTraining"]);
                $("#sub_type").val(data["SubType"]);
            }, 'json');
        }
    });


    //获取项目
    $("#header_master").autocomplete({
        source: "../../modules/action/searchTeacher.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchTeacherByCode.php', {text: ss}, function (data) {
                $('#header_master_id').val(data["TeacherId"]);
            }, 'json');
        }
    });
//上课教师1
    $("#teacher_first").autocomplete({
        source: "../../modules/action/searchTeacher.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchTeacherByCode.php', {text: ss}, function (data) {
                $('#first_id').val(data["TeacherId"]);
            }, 'json');
        }
    });
    //上课教师2
    $("#teacher_second").autocomplete({
        source: "../../modules/action/searchTeacher.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchTeacherByCode.php', {text: ss}, function (data) {
                $('#second_id').val(data["TeacherId"]);
            }, 'json');
        }
    });
    //上课教师3
    $("#teacher_third").autocomplete({
        source: "../../modules/action/searchTeacher.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label;
            $.post('../../modules/action/searchTeacherByCode.php', {text: ss}, function (data) {
                $('#third_id').val(data["TeacherId"]);
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
//    $('#teacher_days').val(0);
//    $('#teachdays_first').val(0);
//    $('#teachdays_second').val(0);
//    $('#teachdays_third').val(0);
    $('#teach_start_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {
            if ($('#teach_end_date').val() >= $('#teach_start_date').val()) {
                //  var days = GetDateDiff($('#teach_start_date').val(), $('#teach_end_date').val());
                //   $('#teacher_days').val(days);
            } else {
                //   $('#teacher_days').val(0);
                $('#teach_end_date').val($('#teach_start_date').val());
            }
        }
    });
    $('#teach_start_date').data('datepicker');
    $('#teach_end_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {
            if ($('#teach_end_date').val() >= $('#teach_start_date').val()) {
                //    var days = GetDateDiff($('#teach_start_date').val(), $('#teach_end_date').val());
                //   $('#teacher_days').val(days);
            } else {
                alert("结束日期小于开始日期！");
                $('#teach_end_date').val($('#teach_start_date').val());
            }
        }
    });
    $('#teach_end_date').data('datepicker');
    $('#startdate_first').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {
            if ($('#enddate_first').val() >= $('#startdate_first').val()) {
                // var days = GetDateDiff($('#startdate_first').val(), $('#enddate_first').val());
                // $('#teachdays_first').val(days);
            } else {
                //   $('#teachdays_first').val(0);
                $('#enddate_first').val($('#startdate_first').val());
            }
        }
    });
    $('#startdate_first').data('datepicker');
    $('#enddate_first').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {
            if ($('#enddate_first').val() >= $('#startdate_first').val()) {
                //  var days = GetDateDiff($('#startdate_first').val(), $('#enddate_first').val());
                //   $('#teachdays_first').val(days);
            } else {
                alert("结束日期小于开始日期！");
                $('#enddate_first').val($('#startdate_first').val());
            }
        }
    });
    $('#enddate_first').data('datepicker');
    $('#startdate_second').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {

            if ($('#enddate_second').val() >= $('#startdate_second').val()) {
                //  var days = GetDateDiff($('#startdate_second').val(), $('#enddate_second').val());
                //  $('#teachdays_second').val(days);
            } else {
                //   $('#teachdays_second').val(0);
                $('#enddate_second').val($('#startdate_second').val());
            }
        }
    });
    $('#startdate_second').data('datepicker');
    $('#enddate_second').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {
            if ($('#enddate_second').val() >= $('#startdate_second').val()) {
                // var days = GetDateDiff($('#startdate_second').val(), $('#enddate_second').val());
                // $('#teachdays_second').val(days);
            } else {
                alert("结束日期小于开始日期！");
                $('#enddate_second').val($('#startdate_second').val());
            }
        }
    });
    $('#enddate_second').data('datepicker');
    $('#startdate_third').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {
            if ($('#enddate_third').val() >= $('#startdate_third').val()) {
                var days = GetDateDiff($('#startdate_third').val(), $('#enddate_third').val());
                // $('#teachdays_third').val(days);
            } else {
                // $('#teachdays_third').val(0);
                $('#enddate_third').val($('#startdate_third').val());
            }
        }
    });
    $('#startdate_third').data('datepicker');
    $('#enddate_third').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date(),
        onSelect: function () {
            if ($('#enddate_third').val() >= $('#startdate_third').val()) {
                var days = GetDateDiff($('#startdate_third').val(), $('#enddate_third').val());
                // $('#teachdays_third').val(days);
            } else {
                alert("结束日期小于开始日期！");
                $('#enddate_third').val($('#startdate_third').val());
            }
        }
    });
    $('#enddate_third').data('datepicker');
    $('#arrange_date').datepicker({
        language: 'zh-CN',
        autoClose: true,
        dateFormat: 'yyyy-mm-dd',
        setDate: new Date()
    });
    $('#arrange_date').data('datepicker');

});
function showdate()
{
    alert(11111);
}

function GetDateDiff(startDate, endDate)
{
    var startTime = new Date(Date.parse(startDate.replace(/-/g, "/"))).getTime();
    var endTime = new Date(Date.parse(endDate.replace(/-/g, "/"))).getTime();
    var dates = Math.abs((startTime - endTime)) / (1000 * 60 * 60 * 24);
    return dates;
}
