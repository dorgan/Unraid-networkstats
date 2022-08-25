<?php
$file = tmpfile();
$name = stream_get_meta_data($file);
$cmd = 'vnstat -i ' . $_GET['i'] . ' --json ' .(!isset($_GET['s']) ? 'd 2' : 'h 14');
$output = shell_exec($cmd);
if (!isset($_GET['debug'])) {
    header('Content-Type: application/json');
    echo($output);
} else {
    var_dump($output);
}
?>
