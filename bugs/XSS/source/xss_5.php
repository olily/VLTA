<?php
if (array_key_exists("xss", $_GET) && $_GET['xss'] != NULL) {
    $_GET['xss'] = preg_replace('/<[^>]+>/', '', $_GET['xss']);
} else {
    $_GET = array('xss' => '');
}
?>