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
                                include "upload.class.php";
                                $up = new fileupload;
// / 设置属性(上传的位置， 大小， 类型， 名字是否要随机生成)
                                $up->set("path", "./uploads/");
                                $up->set("maxsize", 1000000);
                                $up->set("allowtype", array(
                                    "gif",
                                    "png",
                                    "jpg",
                                    "jpeg"
                                ));
                                echo $_FILES["file"]["name"];
                                $up->set("israndname", false);
// 使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名字file, 如果成功返回true, 失败返回false
                                if ($up->upload("file")) {
                                    echo "<pre>";
                                    // 获取上传后文件名字
                                    echo $up->getFileName() . "上传成功,文件路径:" . $up->returnPath();
                                    echo "</pre>";
                                } else {
                                    echo "<pre>";
                                    // 获取上传失败以后的错误提示
                                    echo $up->getErrorMsg();
                                    echo "</pre>";
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