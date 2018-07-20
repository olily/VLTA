<?php
include '../../../coding/8-bit_Unicode_Transformation_Format.php';

class fileupload
{
    // 设置上传文件保存路径
    private $path;
    // 设置限制上传文件的类型
    private $allowtype = array();
    // 设置限制文件上传大小
    private $maxsize;

    /**
     * 设置是否随机重命名文件
     *
     * @param
     *            true
     *            随机
     * @param
     *            flase
     *            不随机
     */
    private $israndname;
    // 源文件名
    private $originName;
    // 临时文件名
    private $tmpFileName;
    // 文件类型
    private $fileType;
    // 文件大小
    private $fileSize;
    // 新文件名
    private $newFileName;
    // 错误号
    private $errorNum = 0;
    // 错误报告消息
    private $errorMess = "";

    /**
     * 用于设置成员属性（$path, $allowtype,$maxsize, $israndname）
     * 可以通过连贯操作一次设置多个属性值
     *
     * @param string $key
     *            成员属性名(不区分大小写)
     * @param mixed $val
     *            为成员属性设置的值
     * @return object 返回自己对象$this，可以用于连贯操作
     */
    function set($key, $val)
    {
        // strtolower() 函数把字符串转换为小写
        $key = strtolower($key);
        /**
         * array_key_exists() 函数检查某个数组中是否存在指定的键名，
         * 如果键名存在则返回 true，如果键名不存在则返回 false。
         * get_class — 返回对象的类名
         * get_class_vars -- 返回由类的默认属性组成的数组
         */
        if (array_key_exists($key, get_class_vars(get_class($this)))) {
            $this->setOption($key, $val);
        }
        return $this;
    }

    function upload($fileFiled)
    {
        $return = true;
        /* 将文件上传的信息取出赋给变量 */
        $name = $_FILES[$fileFiled]["name"];
        $tmp_name = $_FILES[$fileFiled]["tmp_name"];
        $size = $_FILES[$fileFiled]["size"];
        $error = $_FILES[$fileFiled]["error"];
        /* 设置文件信息 */
        if ($this->setFiles($name, $tmp_name, $size, $error)) {
            /* 上传之前先检查一下大小和类型 */
            if ($this->checkFileSize() && $this->checkFileType()) {
                /* 为上传文件设置新文件名 */
                $this->setNewFileName();
                /* 上传文件 大于0为成功， 小于等于0都为错误 */
                if ($this->copyFile()) {
                    return true;
                } else {
                    $return = false;
                }
            } else {
                $return = false;
            }
        } else {
            $return = false;
        }
        // 如果$return为false, 则出错，将错误信息保存在属性errorMess中
        if (!$return)
            $this->errorMess = $this->getError();
        return $return;
    }

    /**
     * 获取上传后的文件名称
     *
     * @param
     *            void
     * @return string 上传后，新文件的名称
     */
    public function getFileName()
    {
        return $this->newFileName;
    }

    /**
     * 上传失败后，调用该方法则返回，上传出错信息
     *
     * @param
     *            void
     * @return string 返回上传文件出错的信息报告
     */
    public function getErrorMsg()
    {
        return $this->errorMess;
    }

    /**
     * 设置上传出错信息
     *
     * @param
     *            void
     * @return string
     */
    public function getError()
    {
        $str = "上传文件<font color='red'>{$this->originName}</font>时出错 : ";
        switch ($this->errorNum) {
            case 2:
                $str .= "文件过大";
                break;
            case 1:
                $str .= "未允许类型";
                break;
            case 0:
                $str .= "上传失败";
                break;
            case -1:
                $str .= "上传目录有错";
            default:
                $str .= "未知错误";
                break;
        }
        return $str .= "<br>";
    }

    /**
     * 设置和$_FILES有关的内容
     *
     * @param string $name
     * @param string $tmp_name
     * @param number $size
     * @param number $error
     * @return boolean
     */
    private function setFiles($name = "", $tmp_name = "", $size = 0, $error = 0)
    {
        $this->setOption("errorNum", $error);
        if ($error) {
            return false;
        }
        $this->setOption("originName", $name);
        $this->setOption("tmpFileName", $tmp_name);
        /* explode() 函数把字符串打散为数组。 */
        $aryStr = explode(".", $name);
        $this->setOption("fileType", strtolower($aryStr[count($aryStr) - 1]));
        $this->setOption('fileSize', $size);
        return true;
    }

    /**
     * 为单个成员属性设置值
     *
     * @param unknown $key
     * @param unknown $val
     */
    private function setOption($key, $val)
    {
        $this->$key = $val;
    }

    /**
     * 设置上传后的文件名称
     */
    private function setNewFileName()
    {
        if ($this->israndname) {
            $this->setOption("newFileName", $this->proRandName());
        } else {
            $this->setOption("newFileName", $this->originName);
        }
    }

    /**
     * 检查上传的文件是否是合法的类型
     *
     * @return boolean
     */
    private function checkFileType()
    {
        if (in_array(strtolower($this->fileType), $this->allowtype)) {
            return true;
        } else {
            $this->setOption("errorNum", 1);
            return false;
        }
    }

    /**
     * 检查上传的文件是否是允许的大小
     */
    private function checkFileSize()
    {
        if ($this->fileSize > $this->maxsize) {
            $this->setOption("errorNum", 2);
            return false;
        } else {
            return true;
        }
    }

    /**
     * 设置随机文件名
     *
     * @return string
     */
    private function proRandName()
    {
        $fileName = date("YmHis") . "_" . rand(100, 999);
        return $fileName . "." . $this->fileType;
    }

    /**
     * 复制上传文件到指定的位置
     *
     * @return boolean
     */
    private function copyFile()
    {
        if (!$this->errorNum) {
            // rtrim() 函数移除字符串右侧的空白字符或其他预定义字符。
            $path = rtrim($this->path, "/") . "/";
            $path .= $this->newFileName;
            // move_uploaded_file() 函数将上传的文件移动到新位置。
            // 若成功，则返回 true，否则返回 false。
            if (@move_uploaded_file($this->tmpFileName, $path)) {
                return true;
            } else {
                $this->setOption("errorNum", -1);
                return false;
            }
        } else {
            return false;
        }
    }

    public function returnPath()
    {
        return $this->path;
    }
}
