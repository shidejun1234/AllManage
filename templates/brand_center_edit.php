<?php
include("../dbconfig.php");
include('../isLogin.php');
date_default_timezone_set("Asia/Shanghai");
$date=date("Y/m/d H:i:s",time());
$id=$_POST['id'];
if (isset($_POST['imgStr'])) {
  $imgStr=$_POST['imgStr'];
  $fff=$_POST['fff'];
  $sql = "UPDATE `brand` SET `$fff`='$imgStr',`date`='$date' WHERE id='$id'";
  if (mysql_query ( $sql )) {
    echo "修改成功！！！";
  }else{
    echo "修改失败！！！";
  }
}else if (isset($_POST['edit'])&&isset($_POST['fileName'])) {
  $edit=$_POST['edit'];
  $fileName=$_POST['fileName'];
  $sql = "UPDATE `brand` SET `$fileName`='$edit',`date`='$date' WHERE id='$id'";
  if (mysql_query ( $sql )) {
    echo "修改成功！！！";
  }else{
    echo "修改失败！！！";
  }
}else{
  if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/png"))){
    if ($_FILES["file"]["error"] > 0)
    {
      echo "Error: " . $_FILES["file"]["error"] . "<br />";
    }
    else
    {
      $iid=$_POST['iid'];
      $fileName=$_POST['fileName'];
      $cName=$_POST['cName'];
      $imgName=$cName."_".$iid."_".time()."_".$_FILES["file"]["name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],
        "../upload/brand_image/" . iconv("UTF-8", "gbk",$imgName));
      // move_uploaded_file($_FILES["file"]["tmp_name"],
      //   "../upload/brand_image/" . $imgName);
      $imgName="https://".$_SERVER['SERVER_NAME']."/join/upload/brand_image/" .$imgName;
      date_default_timezone_set("Asia/Shanghai");
      $date=date("Y/m/d H:i:s",time());

      if ($iid=="imageTop") {
        $imgTop=$_POST['imgTop'];
        $imgTop.=$imgName;
        $sql = "UPDATE `brand` SET `$fileName`='$imgTop',`date`='$date' WHERE id='$id'";
        if (mysql_query ( $sql )) {
          echo "修改成功！！！";
        }else{
          echo "修改失败！！！";
        }
      }else{
        if ($iid=="imageCenter") {
          $imgCenter=$_POST['imgCenter'];
          $imgCenter.=$imgName;
          $sql = "UPDATE `brand` SET `$fileName`='$imgCenter',`date`='$date' WHERE id='$id'";
          if (mysql_query ( $sql )) {
            echo "修改成功！！！";
          }else{
            echo "修改失败！！！";
          }
        }

      }

    }
  }else{
    echo "请选择图片";
  }
}
?>


