<?php
include "../../../includes/PageHeadFileUp.php";
?>
    <center>
        <div id="bg">
            <div id="content">
                <h1>Our Bugs</h1>
                <div id="selection1">
                    <p>File Upload</p>
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
                    <a href="../../SQL.html">
                        <p>SQL Injection</p>
                    </a>
                </div>
            </div>
            <div class="main">
                <p>File Upload</p>
                <div class="main_body">
                    <h2>今天，你准备好hack了吗？</h2>
                    <h1>GO!!!</h1>

                    <div id="subject"
                         style="width: 350px;  height: 200px; background-color: azure; border:outset;  overflow: auto;">
                        <center style="margin-top: 70px;">
                            <form action="" method="post" enctype="multipart/form-data">
                                文件:<input type="file" name="file"/> <br/> <input type="submit" name="submit"
                                                                                 value="上传"/>
                            </form>
                            <?php
                            if (isset($_POST['submit'])) {
                                include '../../../coding/8-bit_Unicode_Transformation_Format.php';
                                $path = "uploads/";
                                $filename = $_FILES["file"]["name"];
                                if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $filename)) {
                                    echo $path . $filename . "<br />" . "图片上传成功";
                                } else {
                                    echo "图片上传失败";
                                }
                            }
                            ?>
                        </center>
                    </div>

                    <div>

                        <div>
                            <button type="button"
                                    style="width: 100px; height: 41px; margin-left: 200px;  margin-top: 70px;">
                                <a href="../../File.html" style="color: darkorange; text-decoration: none;">返 回</a>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
    </center>
<?php
include "../../../includes/PageTail.php";
?>