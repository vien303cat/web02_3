<?php 
include_once("head.php");

if($_GET["ww"] == 1){
    $sql = "insert into good value(null,'".$_GET["seq"]."','".$_SESSION["member"]."')";
    mysqli_query($link,$sql);
}else{
    $sql = "DELETE FROM good where good_acc = '".$_SESSION["member"]."' and good_newseq = '".$_GET["seq"]."'";
    mysqli_query($link,$sql);
}
if(!empty($_GET["rr"])){
    echo "<script>document.location.href='index.php?do=pop'</script>";
}else{
    echo "<script>document.location.href='index.php?do=newsdata&seq=".$_GET["seq"]."'</script>";
}
?>