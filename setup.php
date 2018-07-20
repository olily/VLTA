<?php
include 'coding/8-bit_Unicode_Transformation_Format.php';
$message = "<center>
		<div id=\"bg\">
			<div style=\" margin-top: 80px;\">
				<a href=\"setup.php?setup=yes\">
					<img src=\"img/14.png\">
				</a>
			</div>
			<center>
				<p style=\"font-size: 20px; color:#F0FFFF;\">还没有建立数据库哦！ 
					</br>
					请点击图片创建数据库！</p>
			</center>
		</div>
	</center>";
$db = 0;
if (isset($_REQUEST['setup']) && $_REQUEST['setup'] == 'yes') {
    //重置数据库
    // 连接设置
    include 'config/config.inc.php';
    $conn = new mysqli($server, $username, $password);
    // 检查连接
    if ($conn->connect_error) {
        die("连接失败" . $conn->connect_error);
    }
    // 检查是否已经存在"VLTA"数据库
    if (!mysqli_select_db($conn, $database)) {
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
         * 0 男
         * 1 女
         * 2 未知
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
        $message = "<center>
		<div id=\"bg\">
			<div style=\" margin-top: 80px;\">
				<a href=\"index.php\">
					<img src=\"img/14.png\">
				</a>
			</div>
			<center>
				<p style=\"font-size: 20px; color:#F0FFFF;\">数据库" . $database . "成功创建！ 
					</br>
					点击图片开启您的hack之旅吧！</p>
			</center>
		</div>
	</center>";
    } else {
        // "VLTA"数据库已经存在
        $message = "
        <center>
		<div id=\"bg\">
			<div style=\" margin-top: 80px;\">
				<a href=\"index.php\">
					<img src=\"img/1.png\">
				</a>
			</div>
			<center>
				
					<p style=\"font-size: 20px; color:#F0FFFF;\">数据库" . $database . "已经存在! 
					</br>
					点击图片返回首页</p>
		
			</center>
		</div>
	</center>";
    }
    $db = 1;
    $conn->close();
}
?>

<?php
include "includes/PageHead.php";
?>

<?php
include "includes/PageTail.php";
?>


<div style="color: #F0FFFF;">

    <?php echo $message; ?>
    <?php

    if ($db == 1) {

    } else {


    }

    ?>

</div>
	