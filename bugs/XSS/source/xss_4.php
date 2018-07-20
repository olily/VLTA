<?php
if (array_key_exists("xss", $_GET) && $_GET['xss'] != NULL) {
    $_GET['xss'] = htmlspecialchars($_GET['xss']);
    echo "Hello " . $_GET['xss'] . " you are " . $_GET['gender'];
} else {
    echo "←_←";
}
?>