<?php 
session_start();
$link = mysqli_connect("localhost","root","","db02_3");
mysqli_query($link,"SET NAMES UTF8");
$strtime = strtotime("+6hour");
$nowtime = date("Y-m-d");
$Y = date("Y");
$m = date("m");
$d = date("d");
$l = date("l");
include_once("web_list.php");
?>

<?php 
    if(empty($_SESSION["log"])){
        $sql = "select * from date where date_day = '".$nowtime."'";
        $c1  = mysqli_query($link,$sql);
        $row = mysqli_num_rows($c1);
        if($row == 1){
            $sql = "update date set date_txt = date_txt + 1 where date_day = '$nowtime'";
            mysqli_query($link,$sql);
        }else{
            $sql = "insert into date value(null,'1','".$nowtime."')";
            mysqli_query($link,$sql);
        }
        $_SESSION["log"] = "1";
    }
    $sql = "select * from date where date_day = '".$nowtime."'";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $today = $c2["date_txt"];
    $sql = "select sum(date_txt) as wow from date ";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $wow = $c2["wow"];
?>