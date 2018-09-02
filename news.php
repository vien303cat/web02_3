<?php 
$sql = "select * from news where news_display = 1 ";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);

if(!empty($_GET["page"])){
    $nowpage = $_GET["page"] ;
}else{
    $nowpage = 1 ;
}

$pageadd = 5;
$openpage = ($nowpage - 1) * $pageadd ;
$allpage = ceil( $row / $pageadd );

if($nowpage == 1){
    $fp = 1;
    $np = $nowpage + 1 ;
}else if($nowpage == $allpage){
    $fp = $nowpage - 1 ;
    $np = $allpage;
}else{
    $fp = $nowpage - 1;
    $np = $nowpage + 1;
}

$sql = "select * from news where news_display = 1 limit $openpage,$pageadd";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
?>


<form method="post">
<fieldset>
<legend>目前位置:首頁 > 最新文章區</legend>
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" width="50%">標題</td>
    <td align="center" width="50%">內容</td>
  </tr>
  <?php do{ ?>
  <tr>
    <td align="left" width="50%"><a href="index.php?do=newsdata&seq=<?=$c2["news_seq"]?>"><?=$c2["news_txt"]?></a></td>
    <td align="left" width="50%"><?=mb_substr($c2["news_con"],0,15,"utf-8")."..."?></td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>

    <a href='index.php?do=news&page=<?=$fp?>'> < </a>    
    <?php
    for($i=1;$i<=$allpage;$i++){
        echo "<a href='index.php?do=news&page=".$i."'>".$i."</a>";
    }
    ?>
    <a href='index.php?do=news&page=<?=$np?>'> > </a>   

</fieldset>
</post>