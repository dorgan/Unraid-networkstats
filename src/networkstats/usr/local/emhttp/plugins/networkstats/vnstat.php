<?php
$file = tmpfile();
$name = stream_get_meta_data($file);
$cmd = 'vnstati' . (!isset($_GET['s']) ? ' --style ' . $_GET['style'] . ' -' . $_GET['dh']  : ' -s ') . ' -i ' . $_GET['i'] . ' -o ' .$name['uri'] . (isset($_GET['header']) ? ' --headertext "' . urldecode($_GET['header']) . '"' : '');
$output = shell_exec($cmd);
$size = filesize(stream_get_meta_data($file)['uri']);
if (!isset($_GET['debug'])) {
  header('Content-Type: image/png');
  header('Content-Length: ' .$size );
} else {
  echo $cmd;
}
readfile($name['uri']);
?>
