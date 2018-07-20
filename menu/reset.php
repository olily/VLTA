<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>VLBT-Portal</title>
    <link rel="stylesheet" href="../css/index.css"/>
</head>
<body class="bugs">
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
                    <a href="../index.php">
                        <img src="../img/home.png">
                    </a>
                </td>
                <td>
                    <a href="bugs.html">
                        <img src="../img/bugs.png">
                    </a>
                </td>
                <td>
                    <a>
                        <img src="../img/ed-reset.png">
                    </a>
                </td>
                <td>
                    <a href="more.html">
                        <img src="../img/more.png">
                    </a>
                </td>
                <td>
                    <a href="help.html">
                        <img src="../img/help.png">
                    </a>
                </td>
                <td>
                    <img src="../img/welcome.png">
                </td>
            </tr>
            </tbody>
        </table>
        <p>
            <img src="../img/image.gif" width="796px">
        </p>
    </div>
    <div id="bg">
        <div id="content">
            <h1>Our Bugs</h1>
            <div id="selection1">
                <a href="../bugs/File.html">
                    <p>File Upload</p>
                </a>
            </div>
            <div id="selection2">
                <a href="../bugs/XSS.html">
                    <p>XSS</p>
                </a>
            </div>
            <div id="selection3">
                <a href="../bugs/Code.html">
                    <p>代码审计</p>
                </a>
            </div>
            <div id="selection4">
                <a href="../bugs/Command.html">
                    <p>命令注入</p>
                </a>
            </div>
            <div id="selection5">
                <a href="../bugs/SQL.html">
                    <p>SQL Injection</p>
                </a>
            </div>
        </div>
        <div class="main">
            <img src="../img/3.png" style="margin-top: 90px;">
            <p style="font-size: 40px;  color: azure; font-family: '宋体';">
                <?php
                include '../coding/8-bit_Unicode_Transformation_Format.php';
                //重置上传文件夹
                function DeleteDir($dir)
                {
                    $dh = opendir($dir);
                    while ($file = readdir($dh)) {
                        //文件
                        if ($file != "." && $file != "..") {
                            $fullpath = $dir . "/" . $file;
                            if (!is_dir($fullpath)) {
                                unlink($fullpath);
                            } else {
                                //文件夹
                                DeleteDir($fullpath);
                            }
                        }
                    }
                    closedir($dh);
                    //删除当前文件夹
                    if (rmdir($dir)) {
                        return true;
                    } else {
                        return false;
                    }
                }

                $dir = array(
                    "../bugs/File Upload/File Upload Low/uploads",
                    "../bugs/File Upload/File Upload Medium/uploads",
                    "../bugs/File Upload/File Upload High/uploads"
                );
                foreach ($dir as $path) {
                    DeleteDir($path);
                    mkdir($path);
                }
                // 连接设置
                include '../config/config.inc.php';
                $conn = new mysqli($server, $username, $password);
                // 检查连接
                if ($conn->connect_error) {
                    die("连接失败" . $conn->connect_error);
                }
                // 检查是否已经存在"VLTA"数据库
                if (mysqli_select_db($conn, $database)) {
                    // 先删除数据库"VLTA",再创建"VLTA",达到清空数据库的目的
                    $sql = "drop database $database";
                    $retval = $conn->query($sql);
                    // 创建"VLTA"数据库
                    $sql = "CREATE DATABASE IF NOT EXISTS $database";
                    $retval = $conn->query($sql);
                    if (!$retval) {
                        die("创建\"$database\"数据库失败:" . $conn->error);
                    }
                    // 选择"VLTA"数据库
                    mysqli_select_db($conn, $database);
                    // 创建"users"表
                    $sql = "CREATE TABLE IF NOT EXISTS users (id int(10) NOT NULL AUTO_INCREMENT,username varchar(255) DEFAULT NULL,password varchar(255) DEFAULT NULL,";
                    /**
                     * *
                     * 0男
                     * 1女
                     * 2未知
                     */
                    $sql .= "sex tinyint(1) DEFAULT '0',age tinyint DEFAULT '0',";
                    $sql .= "admin tinyint(1) DEFAULT '0',PRIMARY KEY (id)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
                    $retval = $conn->query($sql);
                    if (!$retval) {
                        $sql = "drop database $database";
                        $retval = $conn->query($sql);
                        die("创建\"users\"表失败:" . $conn->error);
                    }
                    // 为"users"表添加数据
                    /**
                     * md5("VLTA")=86b7b2d14a9f5b35f45f1f1e4f97effe
                     */
                    $sql = "INSERT INTO users (username, password, sex,age,admin) VALUES";
                    $sql .= "('admin', '86b7b2d14a9f5b35f45f1f1e4f97effe',2,18, 1),";
                    $sql .= "('小明', 'xiaoming', 0,15,0),";
                    $sql .= "('小红', 'xiaohong',1, 15,0),";
                    $sql .= "('李雷', 'lilei', 0,20,0),";
                    $sql .= "('韩梅梅', 'hanmeimei',1,22, 0)";
                    $retval = $conn->query($sql);
                    if (!$retval) {
                        $sql = "drop database $database";
                        $retval = $conn->query($sql);
                        die("为\"users\"表添加数据失败:" . $conn->error);
                    }
                    echo "VLTA已经成功重置!";
                } else {
                    echo "数据库\"VLTA\"不存在,检查是否已经成功安装VLTA!";
                }
                $conn->close();
                ?>
            </p>
        </div>
    </div>
</center>

</body>

</html>
