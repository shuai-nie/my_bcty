<?php
session_start();

include_once "conn/conn.php";

$ddnumber = substr(date('YmdHis'), 2, 8).mt_rand(10000, 99999);
$sql = mysqli_query($conn, "select* from tb_city where id=".$_POST['city']."");
$info = mysqli_fetch_array($sql);

if($shfs == "1"){
    $yprice = $info['pt'];
    $shfs = "普通邮递";
}elseif ($shfs == "2"){
    $yprice = $info['kb'];
    $shfs = "邮政特快专递EMS";
}

$array = explode("@", $_SESSION['goodsid']);
$arraynum = explode("@", $_SESSION['goodsnum']);
$totalprice = 0;
for ($i=0; $i<count($array); $i++){
    if($array[$i] != ''){
        $sqlcart = mysqli_query($conn, "select * from tb_bccd where id=".$array[$i] );
        $infocart = mysqli_fetch_array($sqlcart);
        $totalprice += $infocart['price'] * $arraynum[$i];
    }
}
$totalprice = $totalprice + $yprice;

if(mysqli_query($conn, "insert into tb_dd(ddnumber, recuser, sex, address, yb, qq, email, gtel, shfs,spc,yprice, totalprice, createtime,cityid)
values($ddnumber, ".$_POST['recuser'].",". $_POST['sex'].",". $_POST['address'].",". $_POST['yb'].",". $_POST['qq'].",". $_POST['email'].",". $_POST['mtel'].",". $_POST['getl'].",". $shfs.",". $_SESSION['goodsid'].",". $_SESSION['goodsnum'].",". $yprice.",". $totalprice.",". date('Y-m-d H:i:s').",". $_POST['city'] . ") ")){

    unset($_SESSION['goodsid']);
    unset($_SESSION['goodsnum']);
    echo "<script>window.location.href='shopping_dd.php?ddnp='".base64_encode($ddnumber)."</script>";
}else{
    echo "<script>alert('订单信息保存失败,请重试!')</script>";
    
}
