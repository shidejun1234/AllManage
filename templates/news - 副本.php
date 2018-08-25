<?php
require_once '../dbconfig.php';
include('../isLogin.php');
$column=$_POST['column'];
$title=$_POST['title'];
$date=$_POST['date'];
$description=$_POST['description'];
$context=$_POST['context'];
date_default_timezone_set("Asia/Shanghai");
$date=date("Y/m/d H:i:s",time());
$sql="INSERT INTO `news`(`id`, `column`, `title`, `date`, `description`, `context`) VALUES (null,'$column','$title','$date','$description','$context')";
$query=mysql_query($sql);
if ($query) {
    echo "<script>alert('添加成功！')</script>";
}else{
    echo "<script>alert('添加失败！')</script>";
}
echo "<script>window.location.href='news_add.php'</script>";



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

        $imageName=iconv("UTF-8", "gbk",$newsTitle.date("YmdHis",time())."_". $_FILES["file"]["name"]);
        move_uploaded_file($_FILES["file"]["tmp_name"],
          "../assets/upload/" . $imageName);
        //$protocol = empty($_SERVER['HTTP_X_CLIENT_PROTO']) ? 'http:' : $_SERVER['HTTP_X_CLIENT_PROTO'] . ':';
        $newsImage="https://".$_SERVER['SERVER_NAME']."/jiameng/assets/upload/" .$newsTitle.date("YmdHis",time())."_". $_FILES["file"]["name"];
        date_default_timezone_set("Asia/Shanghai");
        $newsTime=date("Y/m/d H:i:s",time());
        $sql = "INSERT INTO news(id, newsTitle, newsJianjie, newsContent, newsImage, newsType, newsTime) VALUES (null,'$newsTitle','$newsJianjie','$newsContent','$newsImage','搞茶','$newsTime')";
        if (mysql_query ( $sql )) {
          echo "添加成功！！！<br/>";
          echo "<a href='news.php'>返回</a>";
        } else {
          echo "添加失败！！！<br/>";
          echo "<a href='news.php'>返回</a>";
        }

    }
  }else{
    echo "请选择图片";
    echo "<a href='news.php'>返回</a>";
  }