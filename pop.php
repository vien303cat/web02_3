<?php 

$sql = "select * from news where news_display = 1";
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
<legend>目前位置:首頁 > 人氣文章區</legend>
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" width="35%">標題</td>
    <td align="center" width="35%">內容</td>
    <td align="center" width="30%">人氣</td>
  </tr>
  <?php do{ 
          $sqll = "select * from good where good_newseq = '".$c2["news_seq"]."'";
          $cc1  = mysqli_query($link,$sqll);
          $row = mysqli_num_rows($cc1);
      ?>
  <tr>
    <td align="left" width="35%"><?=$c2["news_txt"]?></td>
    <td align="left" width="35%" class="ssaa"><?=mb_substr($c2["news_con"],0,15,"utf-8")."..."?>
    <span class="all" style="display:none"><?=$c2["news_con"]?></span>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".ssaa").hover(
							function ()
							{
								$("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>")
								$("#altt").show()
							}
						)
						$(".ssaa").mouseout(
							function()
							{
								$("#altt").hide()
							}
						)
                        </script>

</td>
    <td align="center" width="30%"><?=$row?>個人說<img src="img/02B03.jpg" width="20px">
    <?php 
        $sqll = "select * from good where good_newseq = '".$c2["news_seq"]."' and good_acc = '".$_SESSION["member"]."'";
        $cc1  = mysqli_query($link,$sqll);
        $row = mysqli_num_rows($cc1);
        if($row == 1){
            echo " - "."<a href='good.php?seq=".$c2["news_seq"]."&ww=0&rr=1'>"."收回讚"."</a>";
        }else{
            echo " - "."<a href='good.php?seq=".$c2["news_seq"]."&ww=1&rr=1'>"."讚"."</a>";
        }
    ?>
    </td>
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

