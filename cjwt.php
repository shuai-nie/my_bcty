<!--技术支持模块-->
<?php
$sql = mysql_query("select count(*) as total where tb_cjwt", $conn);

$info = mysql_fetch_array($sql);
$total = $info[total];

if($total == 0){
?>
<tr>
    <td height="22" colspan="2">d<div align="center">对不起，暂无常见问题!</div> </td>
</tr>
<?php
}else{
    if (!isset($_GET['page'])|| !is_numeric($_GET['page'])){
        $page = 1;
    }else{
        $page = intval($_GET['page']);
    }

    $pagesize = 20;
    if($total%$pagesize == 0){
        $pagecount = intval($total/$pagesize);
    }else{
        $pagecount = ceil($total/$pagesize);
    }
    $sql = mysql_query("select * from tb_cjwt order by createtime desc limit ".($page-1)*$pagesize . ", $pagesize", $conn);
    while ($info = mysql_fetch_array($sql)) {
        // 循环数据
    }
}
?>

<table width="600" height="25" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="479">
            <div align="left">&nbsp;&nbsp;共有常见问题&nbsp;<?php echo $total;?>&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize; ?>&nbsp;条&nbsp;第&nbsp;<?php echo $page?>&nbsp;页/共&nbsp;<?php echo $pagecount;?>&nbsp;页</div>
        </td>
        <td width="269">
            <div align="right">
                <a href="<?php echo $_SERVER['PHP_SELF'] ?>?page=1" class="al">首页</a>&nbsp;
                <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php
                if($page > 1)
                    echo $page-1;
                else
                    echo 1;
                ?>" class="al">上一页</a>&nbsp;
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=<?php
                if($page <$pagecount)
                    echo $page+1;
                else
                    echo $pagecount;
                ?>" class="al">下一页</a>&nbsp;
                <a href="<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $pagecount; ?>" class="al">尾页</a>
            </div>
        </td>
    </tr>
</table>
