<?php
$file = tmpfile();
$name = stream_get_meta_data($file);
$cmd = 'vnstati' . (!isset($_GET['s']) ? ' --style ' . $_GET['style'] . ' -' . $_GET['dh']  : ' -s ') . ' -i ' . $_GET['i'] . ' -o ' .$name['uri'];
$output = shell_exec($cmd);
$size = filesize($file);
if (!isset($_GET['debug'])) {
  header('Content-Type: image/png');
  header('Content-Length: ' .$size );
} else {
  echo $cmd;
}
readfile($name['uri']);
?>
