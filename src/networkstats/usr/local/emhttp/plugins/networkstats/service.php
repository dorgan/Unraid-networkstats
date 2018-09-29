<?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'start') {
            shellexec('/etc/init.d/vnstat start');
        } else if ($_GET['action'] === 'stop') {
            shellexec('/etc/init.d/vnstat stop');
        }
        $active       = (intval(trim(shell_exec( "[ -f /proc/`cat /var/run/vnstat/vnstat.pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1);
        if ($active) {
            $status = "<span class='green' id="serviceStatus">Running</span> <a href="/plugins/' . $plugin .'/service.php?$action=stop" class="xhr">stop</a>";
        } else {
            $status= "<span class='orange' id="serviceStatus">Stopped</span> <a href="/plugins/' . $plugin .'/service.php?$action=start" class="xhr">start</a>";
        }

        echo($status);
    }
?>
