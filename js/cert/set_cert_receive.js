/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$().ready(function () {
    //获取项目
    $("#cert_code").autocomplete({
        source: "../../modules/action/searchCert.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label.split(";");
            $.post('../../modules/action/searchCertByCode.php', {text: ss[0]}, function (data) {
                $('#cert_code').val(data["CertCode"]);
                $('#certid').val(data["CertId"]);
                $('#nextexam_date').val(data["NextExamDate"]);
                $.post('../../modules/action/searchPrjoectByCode.php', {text: data["ProCode"]}, function (pro_data) {
                    $('#pro_code').val(pro_data["ProjectCode"]);
                    $('#pro_name').val(pro_data["ProjectYear"] + pro_data["ProjectBatch"] + pro_data["SubTrainingName"] + pro_data["SubTypeName"]);
                    $('#sub_training').val(pro_data["SubTraining"]);
                    $('#sub_type').val(pro_data["SubType"]);
                }, 'json');
                $.post('../../modules/action/searchStudentById.php', {text: data["StudentId"]}, function (student_data) {
                    $('#student_name').val(student_data["StudentName"]);
                    $('#student_num').val(student_data["StudentNum"]);
                    $('#unit_name').val(student_data["UnitName"]);
                    $('#student_phone').val(student_data["StudentPhone"]);
                    $('#student_id').val(student_data["Id"]);
                }, 'json');
            }, 'json');
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
            $.post('../../modules/action/searchPrjoectByCode.php', {text: ss}, function (pro_data) {
                $('#pro_code').val(pro_data["ProjectCode"]);
                $('#pro_name').val(pro_data["ProjectYear"] + pro_data["ProjectBatch"] + pro_data["SubTrainingName"] + pro_data["SubTypeName"]);
                $('#sub_training').val(pro_data["SubTraining"]);
                $('#sub_type').val(pro_data["SubType"]);
            }, 'json');
        }
    });
    $("#student_name").autocomplete({
        source: "../../modules/action/searchStudent.php",
        minLength: 1,
        scrollHeight: 300,
        minChars: 0,
        height: 60,
        autoFocus: false,
        select: function (event, ui) {
            ss = ui.item.label.split(";");
            $.post('../../modules/action/searchStudentById.php', {text: ss[0]}, function (data) {
                $('#student_name').val(data["StudentName"]);
                $('#student_num').val(data["StudentNum"]);
                $('#unit_name').val(data["UnitName"]);
                $('#student_phone').val(data["StudentPhone"]);
                $('#student_id').val(data["Id"]);
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
});

