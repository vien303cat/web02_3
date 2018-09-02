<?php 
$bb = "";
if(!empty($_POST["email"])){
    $sql = "select * from member where member_email = '".$_POST["email"]."' ";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $row = mysqli_num_rows($c1);
    if($row == "0"){
        $bb = "查無此資料"."<br>";
    }else{
        $bb = "您的密碼為:".$c2["member_pw"]."<br>";
    }
}
?>

<form method="post">
<fieldset>
<legend>查詢密碼</legend>
請輸入信箱以查詢密碼<br>
<input type="text" name="email"><br>
<?=$bb?>
<input type="submit" value="尋找">
</fieldset>
</post>