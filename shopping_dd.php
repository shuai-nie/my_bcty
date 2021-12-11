<script>
    function openprintwindow(x, y, x){
        window.open("printwindow.php?ddno="+x+"&pv="+z, "newframe", "top=200,left=200,width=635,height="+(230+20*y)+",menubar=no,location=no,toolbar=no,status=no")
    }
</script>


<td width="75">
    <img src="images/bg_14(11).jpg" width="69" height="20" onclick="javascript:openprintwindow('<?php echo base64_decode($_GET[DDNO]); ?>','<?php echo $gnum; ?>', 'p');" style="cursor: hand;" >
</td>
<td width="75">
    <img src="images/bg_14(11).jpg" width="69" height="20" onclick="javascript:openprintwindow('<?php echo base64_decode($_GET[DDNO]); ?>','<?php echo $gnum; ?>', 'v');" style="cursor: hand;" >
</td>
