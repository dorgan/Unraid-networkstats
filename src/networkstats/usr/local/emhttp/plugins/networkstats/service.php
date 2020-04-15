<?php

    $plugin = 'networkstats';
    $retVal  = (Object)Array(
        'status' => 'Running',
        'ctaValue' => 'Stop Daemon'
    );

    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'start') {
            shell_exec('/etc/rc.d/rc.vnstat start');
        } else if ($_GET['action'] === 'stop') {
            shell_exec('/etc/rc.d/rc.vnstat stop');
        }
        $active       = (intval(trim(shell_exec( "[ -f /proc/`cat /var/run/vnstat/vnstat.pid 2> /dev/null`/exe ] && echo 1 || echo 0 2> /dev/null" ))) === 1);
        if (!$active) {
            $retVal->status = 'Stopped';
            $retVal->ctaValue = 'Start Daemon';
        }
        echo(json_encode($retVal));
    }

?>