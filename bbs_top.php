
<select name="select_type" class="inputcss" onchange="javscript:window.location.location=this.options[this.selectedIndex].value;">
    <?php
    $sql = mysqli_query($conn, "select * from tb_type_smail order by createtime desc");
    $info = mysqli_fetch_array($sql);
    if($info == ""){
        echo "<option>暂无讨论区</option>";
    }else{
        echo "<option>版块快速跳转</option>";
        do{
            echo "<option value='bbs_list.php?id=".$info['id']."'>".$info['title']."</option>";
        }while($info = mysqli_fetch_array($sql));
    }
    ?>
</select>