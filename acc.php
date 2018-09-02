<?php 
    if(!empty($_POST["del"][0])){
        for($i=0;$i<=count($_POST["del"]);$i++){
            $sql = "DELETE FROM member where member_seq ='".$_POST["del"][$i]."'";
            mysqli_query($link,$sql) ;
        }
    }


    $sql = "select * from member ";
    $c1  = mysqli_query($link,$sql);
    $c2  = mysqli_fetch_assoc($c1);
    $row = mysqli_num_rows($c1);
?>

<form method="post">
<fieldset>
<legend>帳號管理</legend>
<table width="80%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" width="45%">帳號</td>
    <td align="center" width="45%">密碼</td>
    <td align="center" width="10%">刪除</td>
  </tr>
  <?php do{ ?>
  <tr>
  <td align="center" width="45%"><?=$c2["member_acc"]?></td>
    <td align="center" width="45%"><?=$c2["member_pw"]?></td>
    <td align="center" width="10%"><input type="checkbox" value="<?=$c2["member_seq"]?>" name="del[]"></td>
  </tr>
  <?php }while($c2  = mysqli_fetch_assoc($c1)) ?>
</table>
<input type="submit" value="確定刪除" >
<input type="reset" value="清空選取" > 
</fieldset>
</post>



<?php 
if(!empty($_POST["qq"]) && !empty($_POST["acc"])){
if(!empty($_POST["acc"]) && !empty($_POST["pw"]) && !empty($_POST["repw"]) && !empty($_POST["email"]) ){
    $sql = "select * from member where member_acc = '".$_POST["acc"]."' ";
    $c1  = mysqli_query($link,$sql);
    $row = mysqli_num_rows($c1);
    if($row == 0){
        $sql = "insert into member value(null,'".$_POST["acc"]."','".$_POST["pw"]."','".$_POST["email"]."')";
        mysqli_query($link,$sql);
        echo "<script>alert('註冊完成，歡迎加入')</script>";
        echo "<script>document.location.href='index.php'</script>";
    }else{
        echo "<script>alert('帳號重複')</script>";
    }
}echo "<script>alert('不可空白')</script>";
}
?>


<form method="post">
<fieldset>
<legend>會員註冊</legend>
<input type ="hidden" value="1" name="qq">
*請設定您要註冊的帳號及密碼(最長12字元)<br>
Step1:登入帳號&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="acc"><br>
Step2:登入密碼&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="pw"><br>
Step3:再次確認密碼&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="repw"><br>
Step4:信箱(忘記密碼時使用)&nbsp;&nbsp;&nbsp;<input type="text" name="email"><br>
<input type="submit" value="註冊">&nbsp;&nbsp;&nbsp;<input type="reset" value="清除">&nbsp;&nbsp;&nbsp;

</fieldset>
</post>