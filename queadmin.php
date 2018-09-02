<?php 
if(!empty($_POST["name"])){
    $sql = "insert into qa1 value(null,'".$_POST["name"]."')";
    mysqli_query($link,$sql);
    $sql = "select * from qa1 where qa1_txt = '".$_POST["name"]."'";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    for($i=0;$i<count($_POST["tt"]);$i++){
        $sql = "insert into qa2 value(null,'".$_POST["tt"][$i]."','".$c2["qa1_seq"]."')";
        mysqli_query($link,$sql);
    }
}

$ee = "<br>選項"."<input type='text' name='tt[]'/>";
?>

<form method="post">
<fieldset>
<legend>新增問卷</legend>
<span id="qq">問卷名稱<input type="text" name="name"></span><br>
選項<input type='text' name='tt[]'/><input type="button" value="更多" onclick="add()"><br><br><br>
<input type="submit" value="新增"><input type="reset" value="清空">
</fieldset>
</post>
<script>
    function add(){
        var ee = "<?=$ee?>" ;
        $("#qq").after(ee) ; 
    }

</script>