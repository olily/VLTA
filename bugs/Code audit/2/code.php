<?php
if ($_POST['submit']) {
    include '../../../coding/8-bit_Unicode_Transformation_Format.php';
    $user = $_POST['username'];
    $psw = $_POST['password'];
    include '../../../config/config.inc.php';
    $conn = mysql_connect($server, $username, $password);
    mysql_select_db($database);
    $sql = "SELECT * FROM users WHERE username = '$user' AND password='$psw'";
    $result = mysql_query($sql);
    $num = mysql_numrows($result);
    if ($num) {
        echo "登录成功" . "</br>";
    } else {
        echo "用户名或者密码错误" . "</br>";
    }
    mysql_close($conn);
}
?>