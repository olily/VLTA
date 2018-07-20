<?php
if (array_key_exists("xss", $_GET) && $_GET['xss'] != NULL) {
    $_GET['xss'] = preg_replace('/script/', '', $_GET['xss']);
    echo "Hello " . $_GET['xss'];
} else {
    echo "←_←";
}
?>