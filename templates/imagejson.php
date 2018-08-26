<?php
    include('../dbconfig.php');
    $cName=$_GET['cName'];
    $sql="SELECT * FROM `brand` where id=cName='$cName'";
    $query=mysql_query($sql);
    $rs=mysql_fetch_assoc($query);
    echo json_encode($rs,320);
?>