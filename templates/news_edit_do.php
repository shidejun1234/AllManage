<?php
require_once '../dbconfig.php';
//取表单数据
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$context = $_POST['context'];
date_default_timezone_set("Asia/Shanghai");
$date=date("Y/m/d H:i:s",time());
//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "UPDATE `brand_news` SET `title`='$title',`description`='$description',`context`='$context',`date`='$date' WHERE id='$id'";
//exit($sql);
if(mysql_query($sql)){
    echo "修改成功！！！";
}else{
    echo "修改失败！！！";
}