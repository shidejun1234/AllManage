<?php
include('../isLogin.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body{font-size: 13px;background: #F4FAFB;padding: 0;margin: 0;}
.tab-div{padding:70px 30px 30px;border-top:2px solid #BBDDE5; }
.information-div{width: 500px;margin-bottom: 15px;}
.information-div div{padding:7px 0px 7px 10px;border-bottom: 1px dashed gray;border-left: 1px solid #80BDCB;border-right: 1px solid #80BDCB;}
.information-div .title{background:#DDEEF2;border: 1px solid #80BDCB;color:#80BDCB;font-weight: bold;}
.information-div .end{border-bottom: 1px solid #80BDCB;}
.information-div .new{color:red;font-size: 18px;font-weight: bold;}
</style>
</head>

<body >

    <!--当前操作  -->
    <div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
        <span style="font-size: 13px;color: #555555;">当前操作 ></span>
        <span style="font-size: 13px;color: gray;" >首页</span>
    </div>
    <!--当前操作  -->

    <div class="tab-div">

        <div class="information-div" >

            <div class="title">信息统计</div>
            <div >留言：有 <a href='message_check.php' class='' title='点击查看新留言'>0</a> 条新留言
                                <span>共  0 条</span>
                          </div><div>新闻动态|文章数: 2 条</div><div class='end'>成功案例|文章数: 1 条</div>
         </div>
         <div class="information-div" >

                <div class="title">登录信息</div>

                <div class="end">身份级别：
                管理员                </div>

         </div>
     </div>

</body>
</html>