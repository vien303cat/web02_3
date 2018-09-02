<?php 

$list["login"] = "login.php";
$list["first"] = "first.php";
$list["forget"] = "forget.php";
$list["memadd"] = "memadd.php";
$list["po"] = "po.php";
$list["pop"] = "pop.php";
$list["que"] = "que.php";
$list["quedata"] = "quedata.php";
$list["vote"] = "vote.php";
$list["news"] = "news.php";
$list["newsdata"] = "newsdata.php";
$list["acc"] = "acc.php";
$list["newsadmin"] = "newsadmin.php";
$list["queadmin"] = "queadmin.php";
$list["adminfirst"] = "adminfirst.php";
if(!empty($_GET["do"])){
    $do = $_GET["do"];
}else{
    $do = "first";
}

if(!empty($_SESSION["member"]) && $_SESSION["member"] == "admin" && empty($_GET["do"])){
    $do = "adminfirst";
}

?>