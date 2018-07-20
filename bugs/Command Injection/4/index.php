<?php
include "../../../includes/CommandHead.php";
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
                <a>
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
            <p>Command Injection</p>
            <div class="main_body">
                <h2>今天，你准备好hack了吗？</h2>
                <h1>GO!!!</h1>
                <div id="subject"
                     style="width: 350px;  height: 200px; background-color: azure; border:outset; overflow: auto;">
                    <center style="margin-top: 70px;">
                        <form action="index.php" method="post">
                            请输入ip测试ping：<input type="text" name="ip">
                            </br>
                            <input type="submit" name="submit" style="  margin-top: 5px;">
                        </form>
                        <?php
                        include '../../../coding/8-bit_Unicode_Transformation_Format.php';
                        if (isset($_POST['submit'])) {
                            $ipAddress = $_REQUEST['ip'];
                            $guolv = array(
                                '&&' => '',
                                ';' => '',
                                '||' => '',
                                '|' => '',
                                '(' => '',
                                ')' => ''
                            );
                            $ipAddress = str_replace(array_keys($guolv), $guolv, $ipAddress);//过滤
                            if (stristr(php_uname('s'), 'Windows NT')) {
                                // Windows系统命令格式如下ping ipaddress
                                $cmd = shell_exec('ping  ' . $ipAddress);
                            } else {
                                //不是windows系统则默认为linux系统
                                $cmd = shell_exec('ping  -c 4 ' . $ipAddress);
                            }
                            echo $cmd;
                        }
                        ?>
                    </center>
                </div>

                <div>
                    <button type="button" style="width: 100px; height: 41px; margin-left: 200px;  margin-top: 70px;">
                        <a href="../../Command.html" style="color: darkorange; text-decoration: none;">返 回</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</center>
<?php
include "../../../includes/PageTail.php";
?>     
	
	
