<?php
include("../dbconfig.php");
include('../isLogin.php');
// 访问student
$query = "SELECT count(id) FROM `person` WHERE stats=0";
$result = mysql_query($query);
$query2 = "SELECT count(id) FROM `person`";
$result2 = mysql_query($query2);
$query3 = "SELECT stats FROM `user` where username='$sessionUserName'";
$result3 = mysql_query($query3);
$row=mysql_fetch_array($result3);
$a="";
$b="";
if ($row['stats']=='2') {
    $a="<a href='message_check.php' class='' title='点击查看新留言'>";
    $b="</a>";
}
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
            <div >留言：有 <?=$a?><text style='color: #ff0000;'><?=mysql_fetch_array($result)[0]?></text><?=$b?> 条新留言
                <span>共  <text style='color: #ff0000;'><?=mysql_fetch_array($result2)[0]?></text> 条</span>
            </div>
         </div>
         <div class="information-div" >

                <div class="title">登录信息</div>

                <div class="end">身份级别：

                <?php

                if ($row['stats']=='1') {
                    echo "普通用户";
                }elseif ($row['stats']=='2') {
                    echo "管理员";
                }

                ?>

                </div>

         </div>
     </div>

</body>
</html>