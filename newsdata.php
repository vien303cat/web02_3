<?php 

$sql = "select * from news where news_seq = '".$_GET["seq"]."'";
$c1  = mysqli_query($link,$sql);
$c2  = mysqli_fetch_assoc($c1);
$row = mysqli_num_rows($c1);
?>


<fieldset>
<legend>文章標題:<?=$c2["news_txt"]?>
<?php if(!empty($_SESSION["member"])){
    $sqll = "select * from good where good_newseq = '".$_GET["seq"]."' and good_acc = '".$_SESSION["member"]."'";
    $cc1  = mysqli_query($link,$sqll);
    $row = mysqli_num_rows($cc1);
    if($row == 1){
        echo " | "."<a href='good.php?seq=".$_GET["seq"]."&ww=0'>"."收回讚"."</a>";
    }else{
        echo " | "."<a href='good.php?seq=".$_GET["seq"]."&ww=1'>"."讚"."</a>";
    }
} ?>
</legend>
<?=nl2br($c2["news_con"])?>
</fieldset>
