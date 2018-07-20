<?php
if (array_key_exists("xss", $_GET) && $_GET['xss'] != NULL) {
    echo "Hello " . $_GET['xss'];
} else {
    echo "←_←";
}
?>