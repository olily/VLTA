<?php
include "../../../includes/PageHeadXSS.php";
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
                <p>XSS</p>
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
                <a href="../../SQL.html">
                    <p>SQL Injection</p>
                </a>
            </div>
        </div>
        <div class="main">
            <p>XSS</p>
            <div class="main_body">
                <h2>今天，你准备好hack了吗？</h2>
                <h1>GO!!!</h1>
                <div id="subject"
                     style="width: 350px;  height: 200px; background-color: azure; border:outset; overflow: auto;">
                    <center style="margin-top: 70px;">
                        <form action="#" method="GET">
                            XSS:<input type="text" name="xss">
                            </br>
                            <input type="submit" value="link" style="margin-top: 5px;">
                        </form>
                        <?php
                        include '../../../coding/8-bit_Unicode_Transformation_Format.php';
                        include '../source/xss_7.php'
                        ?>
                    </center>
                </div>

                <div>
                    <button type="button" style="width: 100px; height: 41px; margin-left: 200px;  margin-top:70px;">
                        <a href="../../XSS.html" style="color: darkorange; text-decoration: none;">返 回</a>
                    </button>
                </div>

            </div>
        </div>
    </div>
</center>
<?php
include "../../../includes/PageTail.php";
?>     
	
	


