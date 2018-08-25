<?php
include("../dbconfig.php");
// 访问student
$query = "select * from brand";
$result = mysql_query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="600;url=message_check.php?page=1">
<link href="message_check_files/list.css" rel="stylesheet" type="text/css">
<title>品牌</title>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<link href="../styles/bootstrap.css" rel="stylesheet" />
<script src="../js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="../js/dataTables/jquery.dataTables.js"></script>
<script src="../js/dataTables/dataTables.bootstrap.js"></script>
</head>
<body>

    <!--当前操作  -->
    <div id="pagehead" style="width: 100%;position: fixed; top: 0px;background:#DDEEF2;padding: 12px;border-bottom: 2px solid #BBDDE5; ">
       <span style="font-size: 13px;color: #555555;">当前操作 &gt;</span>
       <span style="font-size: 13px;color: gray;">品牌列表</span>
   </div>
   <!--当前操作  -->
   <div id="page-inner">
      <!-- /. ROW  -->
      <hr />
      <div class="row">
         <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
               <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover"
                 id="dataTables-example">
                 <thead>
                   <tr>
                     <th style='text-align:center;'><input type='checkbox' id="checkAll" name='checkAll' ></th>
                     <th>ID</th>
                     <th>名字</th>
                     <th>修改时间</th>
                     <th style='text-align:center;'><input type='button' value='删除选中' id='deletecheck' class='btn btn-danger btn-sm shiny'></th>
                 </tr>
             </thead>
             <tbody>
                <?php
                $line = 0;
                while ($row = mysql_fetch_array($result)) {
                  $line ++;
                  $linecolor = $line % 2 == 0 ? 'odd gradeX' : 'even gradeC';
                  echo "<tr class='$linecolor'>";
                  echo "<td style='text-align:center;'><input type='checkbox' name='box' id='box' value='".$row['id']."'></td>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . $row['cName'] . "</td>";
                  echo "<td>" . $row['date'] . "</td>";
            echo "<td style='text-align:center;'><input type='button' name='".$row['id']."' value='删除' id='delete' class='btn btn-danger btn-sm shiny deletethis'></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</div>
</div>
<!--End Advanced Tables -->
</div>
</div>
</div>
<script>
  $(document).ready(function() {
     $('#dataTables-example').dataTable();
 });

  $('.deletethis[type=button]').click(function(event) {
    var f=confirm("确定删除吗?");
    if (!f) {
      return;
  };
  $.ajax({
   type: "POST",
   url: "brand_delete.php",
   data: {
      id:this.name

  },
  success: function(data){
      alert(data);
      window.location.href='mainFrame.php';
  }
});
});
  $('#checkAll').click(function(event) {
    var userids=this.checked;
  //获取name=box的复选框 遍历输出复选框
  $("input[name=box]").each(function(){
    this.checked=userids;
});
});

  $('#deletecheck').click(function(event) {
    var f=confirm("确定删除吗?");
    if (!f) {
      return;
  };
  var ids="";
    $("input[name='box']:checked").each(function() { // 遍历选中的checkbox


      ids+=this.value+",";
  });
    ids = ids.substring(0, ids.lastIndexOf(','));
    $.ajax({
       type: "POST",
       url: "brand_delete.php",
       data: {
          id:ids

      },
      success: function(data){
          alert(data);
          window.location.href='mainFrame.php';
      }
  });
});
</script>
</body></html>