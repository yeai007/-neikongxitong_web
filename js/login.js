/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    if (pass == "")
    {

        $("#zh_error_text").text("密码不能为空！");
        $("#login_msg").css("display", "block");
        ischeck = false;
    }
    if (phone == "")
    {
        $("#zh_error_text").text("请输入帐号！");
        $("#login_msg").css("display", "block");
        ischeck = false;
    }
    return ischeck;
}