<?php
include("../dbconfig.php");
include('../isLogin.php');
$query = "select * from brand";
$result = mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Insert title here</title>
    <style type="text/css">
        html{height: 100%;}
        body {background: #DDEEF2;height: 100%; font-family: "宋体";font-size: 13px;color:#555555;padding:0px;margin:0px;overflow:atuo;
        border-right: 4px solid #80BDCB;border-left: 6px solid #80BDCB;position: relative;}
        a{text-decoration: none;color:#555555}
        img{margin-right: 5px;}
        .label{text-align: center;padding:13px 0px 11px 0px;background: #DDEEF2;border-bottom: 2px solid #BBDDE5;margin-bottom: -10px;}
        .label img{margin-left: 50px;}
        #main-menu {background: #fff;}
        #main-menu .show-menu{position: absolute; top: 40%;right: -1px;padding: 2px;font-weight: bold;background: #CCCCCC;}

        #main-menu .menu{padding:0px 0px 0px 0px;list-style-type:none;text-indent:0;}
        #main-menu .menu li{}
        .menu .item{padding:7px 12px 7px 15px;background: url("../images/nav02.gif") no-repeat;}
        .menu li .menu1{padding:7px 0px 0px 18px;list-style-type:none;text-indent:0;display: none;}
        .menu1 li{padding:3px 0px 3px 0px;}
        .menu1 a:HOVER {color:#008080;}
        .menu1 a:FOCUS {color:red;}

    </style>

</head>
<body>
    <div class="label" id="label">主菜单 <img src="../images/menu_plus.gif" alt="展开收缩" title="展开全部" onclick="explode()"/></div>
    <div id="main-menu">
        <a href="#" class="show-menu" title="隐藏菜单" onclick="showMenu(this)">
            <</a>
            <ul class="menu" id="menu">
                <li>
                    <div class="item">
                        <img src="../images/icon01.gif" />
                        <a href="#">文章管理</a>
                    </div>
                    <ul class="menu1">
                        <li>
                            <img src="../images/icon03.gif" />
                            <a href="news_add.php" target="main-frame">增加文章</a>
                        </li>
                        <li>
                            <img src="../images/icon03.gif" />
                            <a href="news_check.php" target="main-frame">管理文章</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="item">
                        <img src="../images/icon01.gif" />
                        <a href="#">留言管理</a>
                    </div>
                    <ul class="menu1">
                        <li>
                            <img src="../images/icon03.gif" />
                            <a href="message_check.php" target="main-frame">查看留言</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="item">
                        <img src="../images/icon01.gif" />
                        <a href="#">品牌管理</a>
                    </div>
                    <ul class="menu1">
                        <li>
                            <img src="../images/icon03.gif" />
                            <a href="brand_add.php" target="main-frame">添加品牌</a>
                        </li>
                        <li>
                            <img src="../images/icon03.gif" />
                            <a href="brand_show.php" target="main-frame">品牌列表</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="item">
                        <img src="../images/icon01.gif" />
                        <a href="#">内容管理</a>
                    </div>
                    <ul class="menu1">
                        <?php
                            while ($row = mysql_fetch_array($result)) {
                                echo '
                                    <li>
                                        <img src="../images/icon03.gif" />
                                        <a href="brand.php?id='.$row["id"].'" target="main-frame">'.$row["cName"].'</a>
                                    </li>
                                ';
                            }

                        ?>
                    </ul>
                </li>
                <li>
                    <div class="item">
                        <img src="../images/icon01.gif" />
                        <a href="#">系统设置</a>
                    </div>
                    <ul class="menu1">
                        <li>
                            <img src="../images/icon03.gif" />
                            <a href="password_modify.php" target="main-frame">修改密码</a>
                        </li>
                        <li>
                            <img src="../images/icon03.gif" />
                            <a href="user_check.php" target="main-frame">管理用户</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <script type="text/javascript">

            var label=document.getElementById("label");
            var menu=document.getElementById("menu");
var item=menu.getElementsByTagName('div');//主标题
var menu1=menu.getElementsByTagName('ul');//小标题
var state = 0;//代表全部菜单的状态

/**
 **********隐藏整个菜单***********
 */
 function showMenu(arrow){

    if(window.parent.framebody.cols == "200,*"){

        window.parent.framebody.cols = "10,*";
        label.style.display = "none";
        menu.style.display = "none";
        arrow.innerHTML = ">";

    }else{

        window.parent.framebody.cols = "200,*";
        label.style.display = "";
        menu.style.display = "";
        arrow.innerHTML = "<";
    }
}

/**
 *********菜单展开闭合操作*******************
 **/

 for(var i=0; i<item.length;i++)
 {
    item[i].index=i;
    item[i].onclick=function(){
            if(menu1[this.index].style.display =="block"){//如果是展开状态就全部闭合
                for(var i=0; i<item.length;i++){
                    menu1[i].style.display="none";
                    var icon=item[i].getElementsByTagName('img');
                    icon[0].src="../images/icon01.gif";
                }
            }else{                              //是闭合状态时就展开
                for(var i=0; i<item.length;i++){
                    menu1[i].style.display="none";
                    var icon=item[i].getElementsByTagName('img');
                    icon[0].src="../images/icon01.gif";
                }//先闭合全部再展开当前的栏
                menu1[this.index].style.display="block";
                var icon=item[this.index].getElementsByTagName('img');
                icon[0].src="../images/icon02.gif";
            }

        };
    }
//菜单右边的“+”号的开闭操作
function explode(){
    var label = document.getElementById("label");
    var explode=label.getElementsByTagName('img');//获取展开的图片
    if(state == 0){
        for(var i=0; i<item.length;i++){//展开全部
            menu1[i].style.display="block";
            var icon=item[i].getElementsByTagName('img');
            icon[0].src="../images/icon02.gif";
            explode[0].src="../images/menu_minus.gif";
            explode[0].title="收缩全部";
            state=1;
        }
    }else{
        for(var i=0; i<item.length;i++){//收缩全部
            menu1[i].style.display="none";
            var icon=item[i].getElementsByTagName('img');
            icon[0].src="../images/icon01.gif";
            explode[0].src="../images/menu_plus.gif";
            explode[0].title="展开全部";
            state=0;
        }
    }
}
/**
 **********菜单展开闭合操作******************
 **/
</script>
</body>
</html>