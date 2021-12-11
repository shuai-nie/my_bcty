<?php
    include_once "top.php";
?>
<script type="application/javascript">
    marqueesHeight = 222;
    stopscroll = false
    while (marquess){
        style.width = 0;
        style.height = marqueesHeight;
        style.overflowX = "visible"
        style.overflowY = "hidden";
        noWrap = true;
        onmouseover = new Function("stopscroll=true");
        onmouseout = new Function("stopscroll=false");
    }

    document.write('<div id="templayer" style="position:absolute;z-index:1;visibility:hidden;" ></div>');
    preTop = 0;
    currentTop = 0;

    function init(){
        templayer.innerHTML = "";
        while (templayer.offsetHeight <  marqueesHeight) {
            templayer.innerHTML += marquees.innerHTML;
        }
        marquees.innerHTML = templayer.innerHTML + templayer.innerHTML
    }

    function scrollup(){
        if(stopscroll === true) return ;
        preTop == marquees.scrollTop;
        marquees.scrollTop += 1;
    }
</script>

<div id="marquess">
    <table width="200" heigith="25" border="0" align="center" cellpadding="0" cellspacing="0">
        <?php
        $sql = mysql_query("select id,title,createtime from tb_tell order by createtime desc limit 0, 10", $conn);
        $info = mysql_fetch_array($sql);
        if($info == false){
        ?>
        <tr>
            <td height="25">
                <div align="center"><a href="#" class="a4">本站暂无公告发布！</a> </div>
            </td>
        </tr>
        <?php
        }else{
            $i = 1;
            do{
        ?>
        <tr>
            <td height="25" style="padding:4">
                <a href="tellinfo.php?id=<?php echo $info[id]; ?>" class="al" >
                    <?php
                    if($i == 1){
                        echo "<font color=red";
                    }
                    echo $i."&nbsp;";
                    echo unhtml(msubstr($info[title], 0, 50));
                    if(strlen($info[title]) > 50 ){
                        echo "...";
                    }
                    echo "(".str_replace(".", "/", $info[createtime]). ")";
                    if($i == 1){
                        echo "</font>";
                    }
                    ?>
                </a>
            </td>
        </tr>
        <?php
        $i++;
            }while($info=mysql_fetch_array($sql));
        }
        ?>
    </table>
</div>

<script >
function chkinput(form){
    if(form.tal.value == ''){
        alert("请填写联系方式");
        form.tel.select();
        return(false);
    }
    if(form.email.value == ''){
        alert('请输入E-mail地址');
        form.email.select();
        return(false);
    }
    var j = form.email.value.indexOf("@");
    var j = form.emailvalue.indexOf(".");

    if((i<0)||(i-j>0)||(j<0)){
        alert('请输入正确的R-mail地址!');
        form.email.select();
        return(false;)
    }
    return(true);
}
</script>