<?php
if (array_key_exists("xss", $_GET) && $_GET['xss'] != NULL) {
    echo "Hello";
} else {
    $_GET = array('xss' => '');
}
?>