<?php
$file = shell_exec('vnstati -h -i ' . $_GET['i']);
header('Content-Type: image/png');
header('Content-Length: ' . filesize($file) );
echo $file;
?>
