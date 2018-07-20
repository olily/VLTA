<?php
include "../../../includes/CodeHead.php";
?>
<center>
    <div id="bg">
        <div id="content">
            <h1>Our Bugs</h1>
            <div id="selection1">
                <a href="../../File.html">
                    <p>File Upload</p>
                </a>
            </div>
            <div id="selection2">
                <a href="../../XSS.html">
                    <p>XSS</p>
                </a>
            </div>
            <div id="selection3">
                <a>
                    <p>代码审计</p>
                </a>
            </div>
            <div id="selection4">
                <a href="../../Command.html">
                    <p>命令注入</p>
                </a>
            </div>
            <div id="selection5">
                <a href="../../SQL.html">
                    <p>SQL Injection</p>
                </a>
            </div>
        </div>
        <div class="main">
            <p>Code Audit</p>
            <div class="main_body">
                <h2>今天，你准备好hack了吗？</h2>
                <h1>GO!!!</h1>
                <div id="subject"
                     style="width: 350px;  height: 200px; background-color: azure; border:outset; overflow: auto;">
                    <center style="margin-top: 70px;">
                        <form method="post" action="">
                            帐号:<input type="text" name="username">
                            </br>
                            密码:<input type="password" name="password">
                            </br>
                            <input type="submit" name="submit" style="margin-top: 5px;">
                        </form>

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
                                $file = "code.php";
                                highlight_file($file);
                            }
                            mysql_close($conn);
                        }
                        ?>
                    </center>
                </div>

                <div>
                    <button type="button" style="width: 100px; height: 41px; margin-left: 200px;  margin-top: 70px;">
                        <a href="../../Code.html" style="color: darkorange; text-decoration: none;">返 回</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</center>
<?php
include "../../../includes/PageTail.php";
?>
<php? echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
	
	
	









