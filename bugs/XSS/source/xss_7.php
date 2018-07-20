<?php
if (array_key_exists("xss", $_GET) && $_GET['xss'] != NULL) {
    $_GET['xss'] = str_replace("<", "", $_GET['xss']);
    $_GET['xss'] = str_replace(">", "", $_GET['xss']);
    $_GET['xss'] = str_replace('"', '', $_GET['xss']);
    $_GET['xss'] = str_replace("'", "", $_GET['xss']);
    echo "<a href='" . $_GET['xss'] . "'>Link</a>";
}
?>