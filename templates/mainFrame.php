<?php
include('../isLogin.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title id="maintitle">鹿角巷优化站后台管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="../images/favicon.ico" type="image/x-ico" />
<script type="Text/Javascript" language="JavaScript">

if (window.top != window)
{
    window.top.location.href = document.location.href;
}
</script>

<frameset rows="63,*,50" framespacing="0" border="0" id="myframe">
<frame src="top.php" id="header-frame" name="header-frame" frameborder="no" scrolling="no">

<frameset cols="200,*" framespacing="0" border="0" id="framebody">
<frame src="menu.php" id="menu-frame" name="menu-frame" frameborder="no" scrolling="yes">
<frame src="welcome.php" id="main-frame" name="main-frame" frameborder="no" scrolling="yes">
</frameset>

<frame src="bottom.php" id="end-frame" name="end-frame" frameborder="no" scrolling="no">
</frameset>

</head>
<body>
</body>
</html>

