<?php 
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
                $sqll = "select * from qalog where qalog_q2 = '".$c2["qa2_seq"]."'";
                $cc1  = mysqli_query($link,$sqll);
                $row = mysqli_num_rows($cc1);
      ?>
    <?=$c2["qa2_txt"]?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$row?>票 <br><br>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>


</fieldset>
</post>