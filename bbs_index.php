<?php

include_once "top.php";
include_once "bbs_top.php";
?>
<?php
$sql = mysqli_query($conn, "select * from tb_type_big order by createtime desc");
$info = mysqli_fetch_array($sql);
if($info == false){
?>
...
<?php
}else{
   do{
?>
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#fff" bgcolor="#6ebec7">
    <?php
    $sql1 = mysqli_query($conn, "select * from tb_type_smail where bigtypeid=".$info['id']);
    $info1 = mysqli_fetch_array($sql1);
    if($info1 == false){
    ?>
    ...
    <?php
    }else{
    ?>

    <?php
     do{
    ?>
    <tr>
        <td height="30"><font color="#666">创建时间:<?php echo $info1['createtime']; ?></font></td>
    </tr>
    <?php
     }while($info1 = mysqli_fetch_array($sql1));
    ?>
</table>
<?php
    }
}while ($info = mysqli_fetch_array($sql));
   }
        ?>
<?php
include_once "bottom.php";
    ?>