<script>
    function printview(){
        document.all.WebBrowser1.ExecWB(7, 1);
        window.close();

    }
</script>

<body topmargin="0" leftmargin="0" bottommargin="0" onload="
<?php
if($_GET[pv] == 'p'){
?>
    window.print();
    <?php
}elseif($_GET[pv] == 'v'){
    ?>
    printview()
    <?php } ?>
">

</body>