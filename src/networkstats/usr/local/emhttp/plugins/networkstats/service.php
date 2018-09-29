<?php
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'start') {
            shellexec('/etc/init.d/vnstat start');
        } else if ($_GET['action'] === 'stop') {
            shellexec('/etc/init.d/vnstat stop');
        }
        $status = ""
        if ($active) {
            $status = "<span class='green' id="serviceStatus">Running</span> <a href="/plugins/' . $plugin .'/service.php?$action=stop" class="xhr">stop</a>";
        } else {
            $status= "<span class='orange' id="serviceStatus">Stopped</span> <a href="/plugins/' . $plugin .'/service.php?$action=stop" class="xhr">start</a>";
        }

        echo($status);
    }
?>