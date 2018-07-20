<?php
include "../../../includes/PageHeadSQL.php";
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
                <a href="../../Code.html">
                    <p>代码审计</p>
                </a>
            </div>
            <div id="selection4">
                <a href="../../Command.html">
                    <p>命令注入</p>
                </a>
            </div>
            <div id="selection5">
                <a>
                    <p>SQL Injection</p>
                </a>
            </div>
        </div>
        <div class="main">
            <p>SQL Injection</p>
            <div class="main_body">
                <h2>今天，你准备好hack了吗？</h2>
                <h1>GO!!!</h1>
                <div id="subject"
                     style="width: 350px;  height: 200px; background-color: azure; border:outset;  overflow: auto;">
                    <center style="margin-top: 70px;">
                        <form method="get" action="">
                            ID:<input type="text" name="id">
                            </br>
                            <input type="submit" name="submit" style="  margin-top: 5px;">
                        </form>
                        <?php
                        include '../../../coding/8-bit_Unicode_Transformation_Format.php';
                        if (isset($_GET['submit'])) {
                            // 获取输入
                            $id = $_GET['id'];
                            // 检查数据库
                            include '../../../config/config.inc.php';
                            $conn = mysql_connect($server, $username, $password);
                            mysql_select_db($database);
                            $sql = "SELECT username,age FROM users WHERE id = '$id'";
                            $retval = mysql_query($sql);
                            $num = @mysql_numrows($retval);
                            if ($num > 0) {
                                echo "此ID存在于数据库中!";
                            } else {
                                echo "数据库中找不到此ID!";
                            }
                            mysql_close($conn);
                        }
                        ?>
                    </center>
                </div>


                <div>
                    <button type="button" style="width: 100px; height: 41px; margin-left: 200px;  margin-top: 70px;">
                        <a href="../../SQL.html" style="color: darkorange; text-decoration: none;">返 回</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</center>
<?php
include "../../../includes/PageTail.php";
?>    
	
	