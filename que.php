<?php 
    $sql = "select * from qa1 ";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    //$row = mysqli_num_rows($c1);
?>

<form method="post">
<fieldset>
<legend>目前位置:首頁 > 問卷調查</legend>
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" width="10%">編號</td>
    <td align="center" width="60%">問卷題目</td>
    <td align="center" width="10%">投票總數</td>
    <td align="center" width="10%">結果</td>
    <td align="center" width="10%">狀態</td>
  </tr>
  <?php do{ 
                $sqll = "select * from qalog where qalog_q1 = '".$c2["qa1_seq"]."'";
                $cc1  = mysqli_query($link,$sqll);
                $row = mysqli_num_rows($cc1); 
                ?>
  <tr>
  <td align="center" width="10%"><?=$c2["qa1_seq"]?></td>
    <td align="center" width="60%"><?=$c2["qa1_txt"]?></td>
    <td align="center" width="10%"><?=$row?></td>
    <td align="center" width="10%"><a href="index.php?do=quedata&seq=<?=$c2["qa1_seq"]?>">結果</a></td>
    <td align="center" width="10%">
    <?php 
    if(!empty($_SESSION["member"])){
        echo "<a href='index.php?do=vote&seq=".$c2["qa1_seq"]."'>"."參與投票"."</a>";
    }else{
        echo "請先登入";
    }
    ?>        
    </td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>

</fieldset>
</post>