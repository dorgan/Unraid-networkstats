Menu="Stats:3"
Title="Network Stats"
---
<?php
$active       = (intval(trim(shell_exec( "[ -f /proc/`cat /var/run/vnstat.pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1);
if (!$active) {
  echo "<div class='notice'>vnstat service must berunning <strong><big>started</big></strong> to view network stats.</div>";
  return;
}

$plugin = 'network-stats';
$cfg = parse_plugin_cfg($plugin);

?>
