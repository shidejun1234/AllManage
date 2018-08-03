<?php
include('../isLogin.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="news_check.php_files/list.css" rel="stylesheet" type="text/css">
<style type="text/css">
    #operate-div{padding:2px 30px;border-bottom:1px solid #CCCCCC;margin-top: 42px;}
    #operate-div span{vertical-align: middle;}
    #operate-div label.new{color:red;font-size: 15px;}
    #operate-div img{vertical-align: middle;}
    #operate-div select{vertical-align: middle;}
    #operate-div input{vertical-align: middle;}
    #operate-div img.bar{width:1px; height:30px;  margin: 0px 20px;background:#80BDCB; }

    #list-form {margin-top: 0px;}
</style>
</head>

<body>
<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
	<span style="font-size: 13px;color: #555555;">当前操作 &gt;</span>
	<span style="font-size: 13px;color: gray;">管理新闻</span>
</div>
<!--当前操作  -->

<!-- 搜索 -->
  <form method="get" id="searchform" action="news_check.php" name="searchForm">
  	<div id="operate-div">
        <!-- 搜索 -->
        <img src="news_check.php_files/icon_search.gif" alt="SEARCH">
        <select id="search_cat" name="search_cat"><option value="title" selected="selected">标题</option><option value="id">ID</option></select>
       	<input name="keyword" id="keyword" size="12" type="text">
        <input value="查询" type="submit">
        <input value="显示全部" type="submit">
        <img class="bar" alt="">
    </div>
  </form>
<!-- 搜索end -->

<form enctype="multipart/form-data" name="listForm" id="list-form" action="news.php" method="post" onsubmit="return deleteData('all')">

	<div id="list-div">

﻿
        <table id="main-table" cellspacing="1" cellpadding="0">
          	<tbody><tr>
                <th><input onclick="selectAll(this, 'checkboxes')" type="checkbox"></th>
                <th><span>ID</span></th>
                <th><span>文章标题</span></th>
                <th><span>更新时间</span></th>
                <th><span>栏目类别</span></th>
                <th><span>点击数</span></th>
            	<th><span>操作</span></th>
          	</tr><tr class="hover">
        	<td align="center"><input id="checkboxes0" name="checkboxes[]" value="10799" onclick="hasselect()" type="checkbox"></td>
        	<td align="center"><span>10799</span></td>
        	<td onclick="checkboxes0.click()"> <span>加盟鹿角巷奶茶店需要多少加盟费?</span></td>
        	<td align="center"><span>2018-08-02  11:11</span></td>
        	<td align="center"><span>新闻动态</span></td>
        	<td align="center"><span>2</span></td>
            <td align="center">

            	<a href="http://www.fslujiaoxiang.cn/templates/news_modify.php?id=10799" title="编辑"><img src="news_check.php_files/icon_edit.gif" width="16" height="16" border="0"></a>

            	<a href="javascript:;" id="delete10799" data="加盟鹿角巷奶茶店需要多少加盟费?" onclick="deleteData(10799)" title="删除">
                <img src="news_check.php_files/icon_trash.gif" width="14" height="15" border="0"></a>

        	</td>
        </tr>
        <tr class="hover">
        	<td align="center"><input id="checkboxes1" name="checkboxes[]" value="10798" onclick="hasselect()" type="checkbox"></td>
        	<td align="center"><span>10798</span></td>
        	<td onclick="checkboxes1.click()"> <span>鹿角巷创业前景无限好</span></td>
        	<td align="center"><span>2018-05-05  16:36</span></td>
        	<td align="center"><span>新闻动态</span></td>
        	<td align="center"><span>15</span></td>
            <td align="center">

            	<a href="http://www.fslujiaoxiang.cn/templates/news_modify.php?id=10798" title="编辑"><img src="news_check.php_files/icon_edit.gif" width="16" height="16" border="0"></a>

            	<a href="javascript:;" id="delete10798" data="鹿角巷创业前景无限好" onclick="deleteData(10798)" title="删除">
                <img src="news_check.php_files/icon_trash.gif" width="14" height="15" border="0"></a>

        	</td>
        </tr>
        <tr class="hover">
        	<td align="center"><input id="checkboxes2" name="checkboxes[]" value="10797" onclick="hasselect()" type="checkbox"></td>
        	<td align="center"><span>10797</span></td>
        	<td onclick="checkboxes2.click()"> <span>鹿角巷感受不一样的美味</span></td>
        	<td align="center"><span>2018-04-26  15:53</span></td>
        	<td align="center"><span>成功案例</span></td>
        	<td align="center"><span>12</span></td>
            <td align="center">

            	<a href="http://www.fslujiaoxiang.cn/templates/news_modify.php?id=10797" title="编辑"><img src="news_check.php_files/icon_edit.gif" width="16" height="16" border="0"></a>

            	<a href="javascript:;" id="delete10797" data="鹿角巷感受不一样的美味" onclick="deleteData(10797)" title="删除">
                <img src="news_check.php_files/icon_trash.gif" width="14" height="15" border="0"></a>

        	</td>
        </tr>
        <tr class="hover">
        	<td align="center"><input id="checkboxes3" name="checkboxes[]" value="10796" onclick="hasselect()" type="checkbox"></td>
        	<td align="center"><span>10796</span></td>
        	<td onclick="checkboxes3.click()"> <span>鹿角巷好项目值得把握</span></td>
        	<td align="center"><span>2018-04-26  15:52</span></td>
        	<td align="center"><span>新闻动态</span></td>
        	<td align="center"><span>8</span></td>
            <td align="center">

            	<a href="http://www.fslujiaoxiang.cn/templates/news_modify.php?id=10796" title="编辑"><img src="news_check.php_files/icon_edit.gif" width="16" height="16" border="0"></a>

            	<a href="javascript:;" id="delete10796" data="鹿角巷好项目值得把握" onclick="deleteData(10796)" title="删除">
                <img src="news_check.php_files/icon_trash.gif" width="14" height="15" border="0"></a>

        	</td>
        </tr></tbody></table></div>


    <meta charset="UTF-8">
    <style type="text/css">
        #select{}
        #select input{vertical-align: middle;margin: 0;}
        #select span{vertical-align: middle;margin: 0;padding: 0;}
        .paging{text-align: center;margin-top: 20px;margin-bottom:40px;color: #555555;font-size: 13px;}
        .paging a{display: inline-block;text-align: center;text-decoration: none;color: #555555;border:1px solid #CCCCCC;padding:2px 8px 2px 8px;}
        .paging a.current{border:1px solid #008080;background: #80BDCB;}
        .paging a:hover{background:#80BDCB;border:1px solid #008080;}
        .paging input[type="text"]{text-align: center;height: 12px;}

    </style>



    <p id="select">
        &nbsp;<span>全选</span>
        <input onclick="selectAll(this, 'checkboxes')" type="checkbox">&nbsp;
        <input id="btnSubmit" disabled="true" value="删除选中项" type="submit">
        <input name="act" value="deleteAll" type="hidden">
    </p>

	<div class="paging">

            <span>共4条</span>
            <a href="http://www.fslujiaoxiang.cn/templates/news_check.php?page=1&amp;&amp;search_cat=&amp;&amp;keyword=" target="main-frame"> 首页</a>
            <a href="http://www.fslujiaoxiang.cn/templates/news_check.php?page=0&amp;&amp;search_cat=&amp;&amp;keyword=" target="main-frame"> 上一页</a>&nbsp;<a href="http://www.fslujiaoxiang.cn/templates/news_check.php?page=1&amp;&amp;search_cat=&amp;&amp;keyword=" target="main-frame" class="current"> 1</a>&nbsp;<a href="http://www.fslujiaoxiang.cn/templates/news_check.php?page=2&amp;&amp;search_cat=&amp;&amp;keyword=" target="main-frame">下一页</a>
            <a href="http://www.fslujiaoxiang.cn/templates/news_check.php?page=1&amp;&amp;search_cat=&amp;&amp;keyword=" target="main-frame">尾页 </a>

           	<span id="pageSum" sum="1">共1页, 到第</span>
            <input id="toPage" value="1" size="1" type="text">
           	页
            <input value="确定" onclick="goPage()" type="button">

    </div>

</form>
<script type="text/javascript">

//删除信息
function deleteData(id){
	if(id == 'all'){
		if(confirm("确定要删除选中的记录吗？")){
			return true;
		}else{
			return false;
		}

	}else{
		var title = document.getElementById('delete'+id).attributes["data"].value;
		if(confirm("确定要删除 '" + title + "' 吗？")){
			window.location.href = "news.php?act=delete&&id=" + id;
			return true;
		}else
			return false;
	}

}

//跳到指定页面
function goPage(){

	var pageSum = document.getElementById("pageSum").attributes["sum"].value;
	var value = document.getElementById("toPage").value;

	if(value < 1  || pageSum < value){
		alert("请输入正确的页数！");

	}else{
		window.location.href = "?page="+value;
	}

}

//判断是否选中
function hasselect(){
	var countList = 0;
	var cbxList = document.getElementsByName('checkboxes[]');

    for(var i = 0; i < cbxList.length; i++){
       if(cbxList[i].checked == true){
            countList++;
            cbxList[i].parentNode.parentNode.style.background = "#BBDDE5";//选中后改变整行的背景色
       }else{
     	  cbxList[i].parentNode.parentNode.style.background = "";
       }
     }

 	if(countList == 0){
    	 document.getElementById('btnSubmit').disabled = true;
	}else{
    	document.getElementById('btnSubmit').disabled = false;
    }
 }

//选中全部
selectAll = function(obj, chk){

	chk = chk == null ? "checkboxes" : chk;

	var elems = obj.form.getElementsByTagName("INPUT");//获取当前对象的form里面所包含的input

    for (var i=0; i < elems.length; i++){

    	if (elems[i].name == chk || elems[i].name == chk + "[]"){

          	elems[i].checked = obj.checked;

          	if(obj.checked==true){
          		elems[i].parentNode.parentNode.style.background = "#BBDDE5";//选中后改变整行的背景色

          	}else{
              	elems[i].parentNode.parentNode.style.background = "";
           	}
        }
    }

	if(obj.checked){
	  	document.getElementById('btnSubmit').disabled = false;

	}else{
	  	document.getElementById('btnSubmit').disabled = true;
	}
}
</script>


</body></html>