<?php

    $plugin = 'networkstats';

    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'start') {
            shell_exec('/etc/rc.d/rc.vnstat start');
        } else if ($_GET['action'] === 'stop') {
            shell_exec('/etc/rc.d/rc.vnstat stop');
        }
        $active       = (intval(trim(shell_exec( "[ -f /proc/`cat /var/run/vnstat/vnstat.pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1);
        if ($active) {
            $status = '<span class="green" id="serviceStatus">Running <a href="/plugins/' . $plugin .'/service.php?action=stop" class="xhr">stop</a></span>';
        } else {
            $status= '<span class="orange" id="serviceStatus">Stopped <a href="/plugins/' . $plugin .'/service.php?action=start" class="xhr">start</a></span>';

        }

        echo($status);
    }

?>