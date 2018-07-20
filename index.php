<?php
include 'coding/8-bit_Unicode_Transformation_Format.php';
include 'config/config.inc.php';
$conn = new mysqli($server, $username, $password);
if (!mysqli_select_db($conn, $database)) {
    header('Location:setup.php');
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8"/>
        <title>VLBT-Portal</title>
        <script src="js/index.js"></script>
        <link rel="stylesheet" href="css/index.css"/>
    </head>
    <body class="home">
    <center>
        <div id="header">
            <h1>VLTA-Portal</h1>
            <h2>Welcome to Vulnerablity Testing Application! </h2>
        </div>
        <div id="menu">
            <table>
                <tbody>
                <tr>
                    <td>
                        <img src="img/ed-home.png">
                    </td>
                    <td>
                        <a href="menu/bugs.html">
                            <img src="img/bugs.png">
                        </a>
                    </td>
                    <td>
                        <a href="menu/reset.php">
                            <img src="img/reset.png">
                        </a>
                    </td>
                    <td>
                        <a href="menu/more.html">
                            <img src="img/more.png">
                        </a>
                    </td>
                    <td>
                        <a href="menu/help.html">
                            <img src="img/help.png">
                        </a>
                    </td>
                    <td>
                        <img src="img/welcome.png">
                    </td>
                </tr>
                </tbody>
            </table>
            <p>
                <img src="img/image.gif">
            </p>
        </div>
        <div id="bg">
            <div id="content">
                <h1>Our Bugs</h1>
                <div id="selection1">
                    <a href="bugs/File.html">
                        <p>File Upload</p>
                    </a>
                </div>
                <div id="selection2">
                    <a href="bugs/XSS.html">
                        <p>XSS</p>
                    </a>
                </div>
                <div id="selection3">
                    <a href="bugs/Code.html">
                        <p>代码审计</p>
                    </a>
                </div>
                <div id="selection4">
                    <a href="bugs/Command.html">
                        <p>命令注入</p>
                    </a>
                </div>
                <div id="selection5">
                    <a href="bugs/SQL.html">
                        <p>SQL Injection</p>
                    </a>
                </div>
            </div>
            <h1 style="font-size: 35px; color: #FA7105;margin-top: 90px;">欢迎来到VLTA漏洞测试平台</h1>
            <h2 style="font-size: 25px; color: aliceblue;">快开始你的hack之旅吧！！！</h2>
            <canvas id="canvas" width='450' height='450' style="margin-top: -20px;position: relative;"></canvas>
        </div>
    </center>

    </body>
    <script>
        var Game = new Pupple(document.querySelector('#canvas'));
    </script>

    </html>
    <?php
}
?>
