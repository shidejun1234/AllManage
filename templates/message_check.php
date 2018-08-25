<?php
include("../dbconfig.php");
// 访问student
$query = "select * from person";
$result = mysql_query($query);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="refresh" content="600;url=message_check.php?page=1">
<link href="message_check_files/list.css" rel="stylesheet" type="text/css">
<title>留言板</title>
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
       <span style="font-size: 13px;color: gray;">管理留言</span>
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
                     <th>姓名</th>
                     <th>手机号码</th>
                     <th>留言</th>
                     <th>留言时间</th>
                     <th style='text-align:center;'>状态</th>
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
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";
                  echo "<td>" . $row['liuyan'] . "</td>";
                  echo "<td>" . $row['time'] . "</td>";
                  if($row['status']=="1"){
                    $status="已看";
                    $btncolor="btn-success";
                }else{
                    $status="未看";
                    $btncolor="btn-warning";
                }
                /*echo "<td><div class='form-group input-group'>
                <div align='left'>&nbsp;&nbsp;
                    <input type='radio' id='stats' placeholder='状态' ".$stats1." name='".$row['id']."' value='已看'/>已看 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' id='stats'
                    placeholder='状态' ".$stats2." name='".$row['id']."' value='未看'/>未看
                </div>
            </div></td>";*/
            echo "<td style='text-align:center;'><div class='form-group input-group status' id='status'>
            <a id='ttt".$row['id']."' onclick='status(".$row['id'].")' class='btn btn-sm shiny deletethis ".$btncolor."'>".$status."</a>
            </div></td>";
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

function status(e){
    var f=confirm("确定修改吗?");
    if (!f) {
      return;
  };
    var id="#ttt"+e;
    $.ajax({
       type: "POST",
       url: "status_message.php",
       data: {
          id:e,
          status:$(id).text()

      },
      success: function(data){
          alert(data);
        window.location.reload();
      }
  });
}

  $('.deletethis[type=button]').click(function(event) {
    var f=confirm("确定删除吗?");
    if (!f) {
      return;
  };
  $.ajax({
   type: "POST",
   url: "delete_message.php",
   data: {
      id:this.name

  },
  success: function(data){
      alert(data);
      window.location.reload();
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
       url: "delete_message.php",
       data: {
          id:ids

      },
      success: function(data){
          alert(data);
          window.location.reload();
      }
  });
});
</script>
</body></html>