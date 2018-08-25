<?php
include("../dbconfig.php");
include('../isLogin.php');
$id=$_GET['id'];
$query = "select * from brand where id='$id'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="news_check.php_files/list.css" rel="stylesheet" type="text/css">
<title>留言板</title>
<link rel="stylesheet" href="../styles/jquery-ui.min.css">
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<script src="../js/jquery-ui.min.js"></script>

<link href="../styles/bootstrap.css" rel="stylesheet" />
<script src="../js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../js/dataTables/jquery.dataTables.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>

<style>
    .fileinput-button {
        position: relative;
        display: inline-block;
        overflow: hidden;
    }

    .fileinput-button input{
        position:absolute;
        right: 0px;
        top: 0px;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px;
    }

    .imageTops{
        display: flex;
        flex-direction:row;
        margin:0 auto;
        width:90%;
    }

    ul li{
        list-style:none;
    }

</style>
<script>
  $(function() {
    $( "#sortable1" ).sortable();
    $( "#sortable1" ).disableSelection();
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
});
</script>

</head>

<body>
    <div style="width:100%;">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2  align="center"><?=$row['cName']?></h2>
                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default" style="text-align: center;">
                        <form method="post" name="myForm" enctype="multipart/form-data">
                            <input type='hidden' id="id" name='id' type='text' value="<?=$row['id']?>">
                            <input type='hidden' id="cName" name='cName' type='text' value="<?=$row['cName']?>">
                            <br/>
                            <text>修改顶部图片</text>
                            <br/>
                            <?php
                            $str=$row['imageTop'];
                            if ($str!="") {
                                $pieces1 = explode("??", $str);
                                $len=count($pieces1);
                            }else{
                                $len=0;
                            }

                            if ($len>0) {
                                echo "<div><ul id='sortable1' class='imageTops'>";
                                for ($i=0; $i < $len; $i++) {
                                    echo "<li class='ui-state-default'><span class='ui-icon ui-icon-arrowthick-2-n-s'></span><img name='imgTop' src='".$pieces1[$i]."' width='100%' style='border: 1px solid #000000;margin:0px;padding:0px;'><br/>
                                    <input type='button' value='删除' name='".$i."' id='delete' onclick='delTop(this)' class='btn btn-danger btn-sm shiny deletethis'></li>";
                                }
                                echo "</ul></div>";
                            }
                            ?>
                            <br/><br/>
                            <div class="btn btn-success fileinput-button">
                                <label>添加图片</label>
                                <input type="file" name="imageTop" id="imageTop" onchange="addImageTop(this)"/>
                            </div>
                            <div class="btn btn-success fileinput-button">
                                <label>确认修改</label>
                                <input type="" name="editImageTop" id="editImageTop"/>
                            </div>
                            <br/><br/>
                            <text>修改品牌文化描述（<text style="color: #ff0000;">&amp;emsp;</text>相当于一个中文空格）</text>
                            <br/>
                            <textarea name="wenhua" id="wenhua" rows="8" cols="40" onchange="edit(this)"><?=$row['wenhua']?></textarea>
                            <br/><br/>
                            <?php
                            $str=$row['imageCenter'];
                            if ($str!="") {
                                $pieces = explode("??", $str);
                                $len=count($pieces);
                            }else{
                                $len=0;
                            }

                            if ($len>0) {
                                echo "<div><ul id='sortable'>";
                                for ($i=0; $i < $len; $i++) {
                                    echo "<li class='ui-state-default'><span class='ui-icon ui-icon-arrowthick-2-n-s'></span><img name='imgCenter' src='".$pieces[$i]."' width='20%' style='border: 1px solid #000000;margin:0px;padding:0px;'>
                                    <input type='button' value='删除' name='".$i."' id='delete' onclick='delCenter(this)' class='btn btn-danger btn-sm shiny deletethis'></li>";
                                }
                                echo "</ul></div>";
                            }
                            ?>
                            <br/><br/>
                            <div class="btn btn-success fileinput-button">
                                <label>添加图片</label>
                                <input type="file" name="imageCenter" id="imageCenter" onchange="addImageCenter(this)"/>
                            </div>
                            <div class="btn btn-success fileinput-button">
                                <label>确认修改</label>
                                <input type="" name="editImageCenter" id="editImageCenter"/>
                            </div>
                        </form>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });

        function edit(e){
            var id=$("#id").val();
            $.ajax(
            {
                url: 'brand_center_edit.php',
                type: 'POST',
                data: {
                    id:id,
                    edit:e.value,
                    fileName:e.name
                },
                success: function (result) {
                    alert(result);
                    window.location.reload();
                }
            }
            );
        };


        function delTop(e){
            var f=confirm("确定删除吗?");
            if (!f) {
              return;
          };
          $.ajax(
          {
            url: 'brand_center_delete.php',
            type: 'POST',
            data: {
                delName:e.name,
                id:$("#id").val(),
                fff:"imageTop"
            },
            success: function (result) {
                alert(result);
                window.location.reload();
            }
        }
        );
      }


      function delCenter(e){
        var f=confirm("确定删除吗?");
        if (!f) {
          return;
      };
      $.ajax(
      {
        url: 'brand_center_delete.php',
        type: 'POST',
        data: {
            delName:e.name,
            id:$("#id").val(),
            fff:"imageCenter"
        },
        success: function (result) {
            alert(result);
            window.location.reload();
        }
    }
    );
  }


  function addImageTop(e){
    var id=$("#id").val();
    var cName=$("#cName").val();
    var img = e.files[0];
    var name=e.name;
    var iid=e.id;
    var imgTop="";
    for (var i = 0; i < $("img[name=imgTop]").length; i++) {
        imgTop+=$("img[name=imgTop]")[i].src+"??";
    };
    var fm = new FormData();
    fm.append('fileName',name);
    fm.append('file', img);
    fm.append('iid', iid);
    fm.append('id', id);
    fm.append('imgTop', imgTop);
    fm.append('cName', cName);
    $.ajax(
    {
        url: 'brand_center_edit.php',
        type: 'POST',
        data: fm,
            contentType: false, //禁止设置请求类型
            processData: false, //禁止jquery对DAta数据的处理,默认会处理
            //禁止的原因是,FormData已经帮我们做了处理
            success: function (result) {
                //测试是否成功
                //但需要你后端有返回值
                alert(result);
                window.location.reload();
            }
        }
        );
}


function addImageCenter(e){
    var id=$("#id").val();
    var cName=$("#cName").val();
    var img = e.files[0];
    var name=e.name;
    var iid=e.id;
    var imgCenter="";
    for (var i = 0; i < $("img[name=imgCenter]").length; i++) {
        imgCenter+=$("img[name=imgCenter]")[i].src+"??";
    };
    var fm = new FormData();
    fm.append('fileName',name);
    fm.append('file', img);
    fm.append('iid', iid);
    fm.append('id', id);
    fm.append('imgCenter', imgCenter);
    fm.append('cName', cName);
    $.ajax(
    {
        url: 'brand_center_edit.php',
        type: 'POST',
        data: fm,
            contentType: false, //禁止设置请求类型
            processData: false, //禁止jquery对DAta数据的处理,默认会处理
            //禁止的原因是,FormData已经帮我们做了处理
            success: function (result) {
                //测试是否成功
                //但需要你后端有返回值
                alert(result);
                window.location.reload();
            }
        }
        );
}

$("#editImageTop").click(function(event) {
    var f=confirm("确定修改吗?");
    if (!f) {
      return;
  };
  var id=$("#id").val();
  var imgStr="";
  for (var i = 0; i < $("img[name=imgTop]").length; i++) {
    imgStr+=$("img[name=imgTop]")[i].src+"??";
};
imgStr = imgStr.substring(0, imgStr.lastIndexOf('??'));
$.ajax(
{
    url: 'brand_center_edit.php',
    type: 'POST',
    data: {
        imgStr:imgStr,
        id:id,
        fff:"imageTop"
    },
    success: function (result) {
        alert(result);
        window.location.reload();
    }
}
);
});

$("#editImageCenter").click(function(event) {
    var f=confirm("确定修改吗?");
    if (!f) {
      return;
  };
  var id=$("#id").val();
  var imgStr="";
  for (var i = 0; i < $("img[name=imgCenter]").length; i++) {
    imgStr+=$("img[name=imgCenter]")[i].src+"??";
};
imgStr = imgStr.substring(0, imgStr.lastIndexOf('??'));
$.ajax(
{
    url: 'brand_center_edit.php',
    type: 'POST',
    data: {
        imgStr:imgStr,
        id:id,
        fff:"imageCenter"
    },
    success: function (result) {
        alert(result);
        window.location.reload();
    }
}
);
});
</script>
</body></html>