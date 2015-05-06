<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head>
    <title>phpRDWeb - Help - Concurrent Remote Desktop Sessions</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    </head>
    <body>
        <p><li><a href="#WinXP-Vista-7">Windows XP / Windows Vista / Windows 7</a></p>
        <p><li><a href="Win8">Windows 8 / 8.1 Pro</a></p>

Windows 8:
Regedit

HKLM\System\CurrentControlSet\Control\Terminal Server\

fDenyTSConnections (DWORD) = 0
fSingleSessionPerUser (DWORD) = 0



Source: <a href="http://www.nextofwindows.com/how-to-allow-multiple-concurrent-users-log-in-windows-8-through-remote-desktop/"> http://www.nextofwindows.com/how-to-allow-multiple-concurrent-users-log-in-windows-8-through-remote-desktop/ </a>

    </body>
</html>