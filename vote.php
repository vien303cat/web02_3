<?php 

    if(!empty($_POST["ra"])){
        $sql = "insert into qalog value(null,'".$_SESSION["member"]."','".$_GET["seq"]."','".$_POST["ra"]."')";
        mysqli_query($link,$sql);
        echo "<script>document.location.href='index.php?do=que'</script>";
    }

    $sql = "select * from qa1,qa2 where qa1_seq = '".$_GET["seq"]."' and qa1_seq = qa2_q1 ";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $row = mysqli_num_rows($c1);
?>

<form method="post">
<fieldset>
<legend>目前位置:首頁 > 問卷調查 > <?=$c2["qa1_txt"]?></legend>
<?=$c2["qa1_txt"]?><br><br>

  <?php do{ 
      ?>
    <input type="radio" name="ra" value="<?=$c2["qa2_seq"]?>"><?=$c2["qa2_txt"]?>&nbsp;&nbsp;&nbsp;<br>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>

<input type="submit" value="我要投票">
</fieldset>
</post>