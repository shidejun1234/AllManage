<?php
include ('dbconfig.php');
if (! isset ( $_SESSION )) {
    session_start ();
}
if(isset($_POST["captcha"])&&isset($_POST["password"])&&isset($_POST["name"])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $captcha=$_POST["captcha"];
    echo "您刚才输入的是：".$_POST["captcha"]."<br>状态：";
    if($captcha!=$_SESSION["authnum_session"]){
//判断session值与用户输入的验证码是否一致;
        echo "<script>alert('验证码错误！')</script>";
        echo "<script>window.location.href='login.php'</script>";
    }else{
        $username = preg_replace('/[ ]|[\']/', '', $name);
        $passcode = preg_replace('/[ ]|[\']/', '', $password);
        //计算摘要
        $password2 = sha1 ( $passcode );
        $sql = "select * from user where username= '$username' and password='$password2' and stats<>'0'";
        $result = mysql_query ( $sql);
        if ($row = mysql_fetch_array ( $result )) {
            $_SESSION ['userName'] = $name;
            header ( "location:templates/mainFrame.php" );
        }else{
            echo "<script>alert('用户名或密码错误！')</script>";
            echo "<script>window.location.href='login.php'</script>";
        }
    }
}