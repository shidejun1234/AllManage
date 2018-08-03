<?php
if (! isset ( $_SESSION )) {
    session_start ();
}
if (isset ( $_SESSION ['userName'] )) {
    header ( "location:templates/mainFrame.php" );
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>﻿鹿角巷优化站后台系统登录</title>
<link rel="icon" href="images/favicon.ico" type="image/x-ico" />
<style type="text/css">
body{margin: 0; padding: 0; background-color:#f7f7f7;font-size: 14px;font-family: "微软雅黑"}

#login-box{width:850px; margin:90px auto 0 auto;padding:0;}
#scrol_bar{margin-left:0%;margin-bottom: 10px;}
#scrol_bar font{}
.login-main{margin: 0;padding:0;background: #009966;padding-top: 1px;padding-bottom: 10px;border: 0px solid #009966;border-radius:2px;box-shadow: 0px 0px 8px 2px rgba(200, 200, 200, 0.2);}
.login-top{margin: 15px;}
.login-top h2{margin: 0;padding:0;display: inline-block;}
.login-top a{float: right;color: #eee;text-decoration: none;font-size: 12px;margin: 5px 0;}
.login-top a:HOVER{text-decoration: underline;}
.login-bar{padding:20px 80px 20px 80px;}
.login-content{background:#ffffff;padding: 30px 0px 30px 0px;border-radius:0px;}
#login_table td{padding-top: 7px;font-size: 14px;}
.captcha-img {width:75px; height:22px; margin:0px; padding:0px;vertical-align:middle; border:0; cursor: pointer; }
input.button{width:152px; background: #66CC66; padding:5px 0 4px; margin-top:10px; border:0;
             border-radius:3px; color:#FFFFFF; font-weight: bolder; font-size:15px;}
.copyright{width: 100%; margin-top: 20px; text-align: center; font-size: 12px; color: #FFFFFF;}
</style>

<script type="text/javascript">

</script>
</head>
<body>
<div id="login-box">
    <div id="scrol_bar">
        <marquee scrollAmount=5 width=100% ><FONT style="font-size: 14pt;color:#FF6666;font-family: '宋体';" >欢迎来到本系统</FONT></marquee>
    </div>
    <div class="login-main">
        <div class="login-top"><h2 style="color:#fff;">网站后台登录</h2> <a href="index.html" target="_blank">返回网站主页</a></div>
        <div class="login-content">
            <form method="post" action="logindo.php" name='theForm' onsubmit="return validate()" >
              <table align="center" >
                  <tr>
                    <td ><img src="images/login.png" width="150" height="180" border="0"/></td>
                    <td class="login-bar"><img src="images/login_bar.jpg" width="1" height="150" border="0"/></td>
                    <td >
                        <table id="login_table">

                            <tr>
                                <td>用户名：</td><td><input id="name" type="text" name="name" AUTOCOMPLETE="OFF"  style="width: 150px;"/></td>
                            </tr>
                            <tr>
                                <td>密&#12288;码：</td>
                                <td><input type="password" id="password" name="password" style="width: 150px;"/></td>
                            </tr>
                            <tr>
                                <td>验证码：</td>
                                <td><input type="text" id="captcha" name="captcha" AUTOCOMPLETE="OFF"  style="width: 70px;vertical-align:middle;"/>
                                    <img src="./captcha.php" class="captcha-img" alt="验证码" onclick="this.src='captcha.php?'+Math.random();" title="点击切换另一张" />
                                </td>
                            </tr>

                            <tr>
                                <td>&nbsp;</td>
                                <td ><input type="submit" class="button" value="登录" />
                                <input type="hidden" name="act" value="signin" /></td>
                            </tr>
                          </table>
                      </td>
                  </tr>
                </table>
            </form>
        </div>

        <p class="copyright">© 2016-2017 佛山市鹿角巷餐饮管理有限公司 All rights reserved. | 粤ICP备18078110号 Version: 2.0.1</p>
   </div>
  </div>
<script language="JavaScript" src="js/jquery-3.3.1.min.js"></script>
<script language="JavaScript" src="js/judge.js"></script>
<script type="text/javascript">

    document.forms['theForm'].elements['name'].focus();//获取焦点

     /** 检查表单输入的内容**/
    function validate(){

        var validator = new judge();
        validator.required('name', '账号不能为空！');
        validator.required('password', '密码不能为空！');

        if (document.forms['theForm'].elements['captcha']) {
          validator.required('captcha', '验证码不能为空！');
        }

        /*if (trim($("#name").val())=="") {
            alert('账号不能为空！');
        };

        if (trim($("#password").val())=="") {
            alert('密码不能为空！');
        };

        if (trim($("#captcha").val())=="") {
            alert('验证码不能为空！');
        };*/

        /*if ((trim($("#name").val())!="")&&(trim($("#password").val())!="")&&(trim($("#captcha").val())!="")) {
            $.ajax({
                type:"POST"
                url:"logindo.php",
                data:{

                }
            })
        };*/

        return validator.passed();

      }

      function trim(e){
        var str=e.replace(/\s+/g,"");
        return str;
      }

</script>
</body>
</html>

