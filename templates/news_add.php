<?php
include('../isLogin.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../styles/add.css" rel="stylesheet" type="text/css" />

<!-- kindeidtor编辑器设置 -->
<link rel="stylesheet" href="../js/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="../js/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="../js/kindeditor/lang/zh-CN.js"></script>
<script type="text/javascript">
  var editor;
  KindEditor.ready(function(K) {

    editor = K.create('textarea[name="context"]', {
      allowFileManager : true
    });

    K('input[name=save]').click(function(e) {
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
      <form enctype="multipart/form-data" action="news.php" method="post" name="theForm" onsubmit="return validate()" >
        <table width="90%" id="general-table"  cellspacing="10px" >
          <tr>
            <td class="label" >栏目:</td>
            <td>
              <select name="column">
              ﻿<option value='3'>新闻动态</option><option value='4'>成功案例</option>             </select>
            </td>
          </tr>
          <tr>
            <td class="label" >文章标题:</td>
            <td><input type="text" name="title" value=""  style="float:left;" size="80" />
            </td>
          </tr>
          <tr >
            <td class="label" >更新日期:</td>
            <td >
              <input name="date" type="text" size="25" value="2018-08-02  14:09" />
            </td>
          </tr>
          <tr>
            <td class="label">关键字:</td>
            <td><input type="text" name="keywords" value=""  placeholder="使用，隔开关键词" style="float:left;" size="120" /></td>
          </tr>
          <tr>
            <td class="label">内容描述:</td>
            <td><textarea  name="description"  style="width:80%;height:50px;"></textarea></td>
          </tr>
          <tr>
            <td class="label">文章内容:</td>

          </tr>
          <tr>
            <td class="label">&nbsp;</td>
            <td><textarea  name="context" style="width:100%;height:500px; "></textarea></td>
          </tr>
          <tr>
             <td >&nbsp;</td>
          </tr>
          <tr>
            <td >&nbsp;</td>
            <td>
            <input type="submit" value="  保存   " name="save" />
            <input type="reset" value="  重置   " style="" />
            </td>
          </tr>
        </table>

        <input type="hidden" name="act" value="add" />
      </form>
     </div>

<script language="JavaScript" src="../js/judge.js"></script>
<script  language="JavaScript" >
/**
 * 检查表单输入的内容是否为空
 */
function validate()
{
    var validator = new judge();

      validator.required('title', '文章标题不能为空！');

      //validator.required('context', '内容不能为空！');
      validator.required('date', '日期不能为空！');

      return validator.passed();
}
</script>
</body>
</html>