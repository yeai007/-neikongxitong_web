/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var yzm = "";
$().ready(function () {
    resetCode();
    $(document).keydown(function (event) {
        if (event.keyCode == 13) {
            login();
        }
    });

});
function login()
{
    if (check())
    {
        var pass = $.trim($("#pass").val());
        var phone = $.trim($("#phone").val());
        $.post("../modules/action/loginClass.php", {type: "login", pass: pass, code: phone}, function (data) {
            //document.getElementById('right').innerHTML = data;
            var obj = JSON.parse(data);
            if (obj.status == 1) {
                window.location.href = "../modules/index/index.php";
            } else {
                $("#zh_error_text").text(obj.msg);
                $("#login_msg").css("display", "block");
            }
        });
    } else {
        $("#zh_error_text").text(obj.msg);
        $("#login_msg").css("display", "block");
    }
}
function check()
{
    var ischeck = true;
    var pass = $.trim($("#pass").val());
    var phone = $.trim($("#phone").val());
    var code = $.trim($("#code").val());
    if (phone == "")
    {
        $("#zh_error_text").text("请输入帐号！");
        $("#login_msg").css("display", "block");
        ischeck = false;
        return ischeck;
    }
    if (pass == "")
    {
        $("#zh_error_text").text("密码不能为空！");
        $("#login_msg").css("display", "block");
        ischeck = false;
        return ischeck;
    }

    if (code != yzm)
    {

        $("#zh_error_text").text("验证码错误！");
        $("#login_msg").css("display", "block");
        ischeck = false;
        return ischeck;
    }
    return ischeck;
}
function resetCode() {
    $.post("../modules/action/getNewYZM.php", {}, function (data) {
        //document.getElementById('right').innerHTML = data;
        $("#verImg").html(data.data);
        yzm = data.code;
//        $("#code").val(data.code);
    }, 'json');
}