<?php

class  wujunji
{
    public $file1 = 'code.php';

    public function __construct($file1)
    {
        $this->file1 = $file1;
    }

    function __destruct()
    {
        echo @highlight_file($this->file1, true);
    }
    //flag is in 222.php!!!!!!!!!
    //听说php有个功能叫反序列化？还听说反序化有漏洞？
    function __wakeup()
    {
        if ($this->file1 != 'code.php') {
            $this->file1 = 'code.php';
        }
    }
}

if (isset($_POST['submit'])) {
    $a = $_POST['fun'];
    @unserialize($a);
}
?>