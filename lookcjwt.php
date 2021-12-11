<!--用于输出cjwt.php文件中对应问题的详细介绍和解决方案-->
<?php
include_once ("conn/conn.php");
include_once ("function.php");

$sql = mysqli_query("Select * from tb_cjwt where id='".$_GET['id'] . "'", $conn);
$info = mysqli_fetch_array($sql);
?>

<table width="635" height="100" border="0" align="center" cellspacing="0" cellpadding="0" >
    <tr>
        <td width="94" height="30"><div align="center"><strong>问&nbsp;&nbsp;题</strong></div> </td>
        <td width="541"><?php echo unhtml($info[question]);?></td>
    </tr>
    <tr>
        <td height="70"><div align="center"><strong>解&nbsp;&nbsp;答</strong></div></td>
        <td height="70">&nbsp;<?php echo unhtml($info['answer']); ?></td>
    </tr>
</table>
