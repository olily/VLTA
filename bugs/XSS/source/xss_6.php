<?php
if (array_key_exists("xss", $_GET) && $_GET['xss'] != NULL) {
    while ($_GET['xss'] != preg_replace('/script/i', '', $_GET['xss'])) {
        $_GET['xss'] = preg_replace('/script/i', '', $_GET['xss']);
    }
    $_GET['xss'] = preg_replace('/on\w+=/i', 'onxxx=', $_GET['xss']);
    echo "Hello " . $_GET['xss'];
} else {
    echo "←_←";
}
?>