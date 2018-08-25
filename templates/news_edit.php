<?php
include("../dbconfig.php");
include('../isLogin.php');
$id = $_POST['id'];
// 访问news
$query = "SELECT * from news WHERE id=$id";
$result = mysql_query($query);
$row = mysql_fetch_array($result)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<!-- kindeidtor编辑器设置 -->
<link rel="stylesheet" href="../js/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="../js/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="../js/kindeditor/lang/zh-CN.js"></script>
<script type="text/javascript">
  var editor;
  KindEditor.ready(function(K) {

    editor = K.create('textarea[name="context"]', {
      allowFileManager : true
    });

    K('input[name=submit]').click(function(e) {
      if(editor.isEmpty()){alert("文章内容还没填写噢（^_^）!");}
    });

  });
</script>
<!-- kindeidtor编辑器设置 -->

</head>

<body >

<!--当前操作  -->
<div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
  <span style="font-size: 13px;color: #555555;">当前操作 ></span>
  <span style="font-size: 13px;color: gray;" >增加文章</span>
</div>
<!--当前操作  -->
<!-- start client form -->

    <!-- tab body -->
    <div id="tabbody-div">
      <form enctype="multipart/form-data" name="theForm">
        <table width="90%" id="general-table"  cellspacing="10px" >
        <input type='hidden' id="id" name='id' type='text' value="<?=$row['id']?>">
          <tr>
            <td class="label" >栏目:</td>
            <td>
              <select name="column">
              ﻿<option value='新闻动态'>新闻动态</option><option value='成功案例'>成功案例</option>             </select>
            </td>
          </tr>
          <tr>
            <td class="label" >文章标题:</td>
            <td><input type="text" name="title" id="title" value="<?=$row['title']?>"  style="float:left;" size="80" />
            </td>
          </tr>
          <tr>
            <td class="label">内容描述:</td>
            <td><textarea  name="description" id="description" style="width:80%;height:50px;"><?=$row['description']?></textarea></td>
          </tr>
          <tr>
            <td class="label">文章内容:</td>
          </tr>
          <tr>
            <td class="label">&nbsp;</td>
            <td><textarea  name="context" id="context" style="width:100%;height:500px; "><?=$row['context']?></textarea></td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="button" value="  保存   " name="submit" id="submit" />
            </td>
          </tr>
        </table>
        <input type="hidden" name="act" value="add" />
      </form>
     </div>

<script>
    $("#submit").click(function(event) {
        var id=$("#id").val();
        var title=$("#title").val();
        var description=$("#description").val();
        editor.sync();
        var context=$("#context").val();
       $.ajax({
     type: "POST",
     url: "news_edit_do.php",
     data: {
      id:id,
      title:title,
      description:description,
      context:context
    },
    success: function(data){
      alert(data);
      window.location.reload();
    }
  });
    });
</script>
</body>
</html>