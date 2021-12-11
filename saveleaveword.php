<?php
session_start();
$xym = $_POST[xzm];

if($xym != $_SESSION['autonum']){
    echo "<script>alert('校验码输入错误！')</script>";
    exit();
}
$title   = $_POST['title'];
$content = $_POST['content'];
$type    = $_POST['type'];

include_once "conn/conn.php";

$sql = mysqli_query($conn, "insert into tb_user where usernc='".$_SESSION[unc]."'");
$info = mysqli_fetch_array($sql);
$userid = $info[id];

if(mysqli_query($conn, "insert int tb_leaveword(userid, type, title, content, createtime)values($userid, $type, $title, $content, ".date('Y-m-j H:i:s').")")){
    echo "<script>alert('留言发表成功');history.back();</script>";
}else{
    echo "<script>alert('留言发表失败!');history.back();</script>";
}
?>