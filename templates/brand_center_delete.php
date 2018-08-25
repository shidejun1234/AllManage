<?php
require_once '../dbconfig.php';
//取表单数据
$delName = $_POST['delName'];
$id=$_POST['id'];
$fff=$_POST['fff'];
date_default_timezone_set("Asia/Shanghai");
$date=date("Y/m/d H:i:s",time());
$query = "select * from brand where id='$id'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if ($fff=="imageTop") {
  $str=$row['imageTop'];
}elseif ($fff=="imageCenter") {
  $str=$row['imageCenter'];
}
$arr = explode("??", $str);

unset($arr[$delName]);
$image = implode("??", $arr);
$sql = "UPDATE `brand` SET `$fff`='$image',`date`='$date' WHERE id='$id'";
if (mysql_query ( $sql )) {
  echo "删除成功！！！";
}else{
  echo "删除失败！！！";
}

