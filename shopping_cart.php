<table width="720" height="47" border="0" align="center" cellspacing="0" cellpadding="0" bgcolor="#999999">
    <?php
    $array = explode("@", $_SESSION['goodsid']);
    $arraynum = explode("@", $_SESSION['goodsnum']);
    $markid = 0;
    for($i=0; $i < count($array); $i++){
        if($array[$i] != ""){
            $markid++;
        }
    }

    if($markid == 0){
    ?>
    <tr>
        <td height="22" colspan="4" bgcolor="#fff"><div align="center">对不起您的购物车中暂无商品信息</div></td>
    </tr>
    <?php
    }else{
        $totalpric = 0;
        for ($i=0; $i<count($array); $i++){
            if ($array[$i] != ""){
                $sqlcart = mysqli_query($conn, "select * from tb_bccd where id='".$array[$i]."'");
                $infocart = mysqli_fetch_array($sqlcart);
    ?>
    <tr>
        <form name="form<?php echo $array[$i]; ?>" method="post" action="changegoossnum.php">
            <td height="22" bgcolor="#fff">&nbsp;<?php echo unhtml($infocart['bccdname']) ?></td>
            <td height="22" bgcolor="#fff"><div align="center">
                    <?php echo number_format($infocart['price'], 2);?> ?>
                </div> </td>
            <td height="22" bgcolor="#fff"><div align="center">
                    <input type="text" name="goodsnum" value="<?php echo $arraynum[$i];?>" class="inputcss" size="8" />
                    <input type="text" name="id" value="<?php echo $infocart['id'];?>" >
                </div> </td>
            <td height="22" bgcolor="#fff"><div align="center">
                    <a href="javascript:form<?php echo $infocart['id']; ?>" class="al">删除该项</a>
                </div>

            </td>
        </form>
    </tr>
    <?php
    $totalpric += $infocart['price']*$arraynum[$i];
            }
        }
    }
    ?>

</table>