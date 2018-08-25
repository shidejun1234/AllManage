<?php
require_once '../dbconfig.php';
    //取表单数据
$id = $_POST['id'];
$status = $_POST['status'];

if ($status=="未看") {
    $status="1";
}else{
    $status="0";
}

//sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "UPDATE `person` SET `status`='$status' WHERE id=$id";
//exit($sql);

if ($status=="1") {
    $status="已看";
}else{
    $status="未看";
}

if(mysql_query($sql)){
    echo "修改成功，已经修改为".$status."！！！";
}else{
    echo "修改失败！！！";
}




