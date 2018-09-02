<?php 
if(!empty($_POST["acc"])){
    $sql = "select * from member where member_acc = '".$_POST["acc"]."' and member_pw = '".$_POST["pw"]."'";
    $c1  = mysqli_query($link,$sql);
    $row = mysqli_num_rows($c1);
    if($row == 1){
        $_SESSION["member"] = $_POST["acc"];
        echo "<script>document.location.href='index.php'</script>";
    }else{
        echo "<script>alert('帳號或密碼錯誤')</script>";
    }
}
?>

<form method="post">
<fieldset>
<legend>會員登入</legend>
帳號:<input type="text" name="acc"><br>
密碼:<input type="text" name="pw"><br>
<input type="submit" value="登入"><input type="reset" value="清除">&nbsp;&nbsp;&nbsp;
<a href="?do=forget">忘記密碼</a> | <a href="?do=memadd">尚未註冊</a>
</fieldset>
</post>