<?php
require_once '../dbconfig.php';
header("content-type:text/html;charset=utf-8");
$column=$_POST['column'];
$title=$_POST['title'];
$date=$_POST['date'];
$keywords=$_POST['keywords'];
$description=$_POST['description'];
$context=$_POST['context'];
print_r($column);
print_r($title);
print_r($date);
print_r($keywords);
print_r($description);
print_r($context);