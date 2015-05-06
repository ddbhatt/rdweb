<?php
require_once 'Ico.php';

function fileExists($fileName, $caseSensitive = true) {

    if(file_exists($fileName)) {
        return $fileName;
    }
    if($caseSensitive) return false;

    // Handle case insensitive requests
    $directoryName = dirname($fileName);
    $fileArray = glob($directoryName . '/*', GLOB_NOSORT);

    $fileNameLowerCase = strtolower($fileName);
    foreach($fileArray as $file) {
        if(strtolower($file) == $fileNameLowerCase) {
            return $file;
        }
    }
    return false;
}

if (!function_exists('getimagesizefromstring')) {
    function getimagesizefromstring($data)
    {
        $uri = 'data://application/octet-stream;base64,' . base64_encode($data);
        return getimagesize($uri);
    }
}

function resizePng($im, $dst_width, $dst_height) {
    // http://blog.ginchen.de/en/2009/08/07/png-transparenzen-erhalten-mit-gd-lib/
    // Check if GD extension is loaded
    if (!extension_loaded('gd') && !extension_loaded('gd2')) {
        trigger_error("GD is not loaded", E_USER_WARNING);
        return false;
    }

    $width = imagesx($im);
    $height = imagesy($im);

    //$newImg = imagecreatetruecolor($dst_width, $dst_height);
    $newImg = imagecreate($dst_width, $dst_height);

    imagealphablending($newImg, false);
    imagesavealpha($newImg, true);

    //$transparent = imagecolorallocate($newImg, 255, 255, 255);
    //$transparent = imagecolorallocatealpha($newImg, 255, 255, 255, 127);
    $transparent = imagecolorallocatealpha($newImg, 0, 0, 0, 127);


    //imagefill($newImg, 0, 0, $transparent);
    imagefilledrectangle($newImg, 0, 0, $width, $height, $transparent);

    imagecopyresampled($newImg, $im, 0, 0, 0, 0, $dst_width, $dst_height, $width, $height);

    return $newImg;
}

function GetRDPvalue($f1,$theName) {
    $theNameLen = strlen($theName);
    $theValue='';
    $handle = fopen($f1, "r");
    if ($handle) {
        While (($line = fgets($handle)) !== false) {
            if (strlen($line) > $theNameLen) {
                if (strtolower(substr($line,0,$theNameLen)) === $theName) {
                    $theValue=substr($line,$theNameLen,strlen($line));
                }
            }
        }
        $theValue = str_replace("|","",$theValue);
    }
    return trim($theValue);
    fclose($handle);
}

function GetAvailableIcoFile($RDP_FileName, $RemoteType) {
    // fileName would be like "NETBIOS-Application"

    $ApplicationName = substr($RDP_FileName, strrpos($RDP_FileName, "-")+1);
    $NetbiosName = substr($RDP_FileName, 0, strrpos($RDP_FileName, "-"));
    $FoundFile = '';

    if ($RemoteType === 'App') {
        // For Remote Apps

        // first try to get "NETBIOS-Application.ico"
        $ReturnFileName = fileExists('../icon/apps/'.$RDP_FileName.'.ico');
        if ($ReturnFileName !== false) {
            $FoundFile = $ReturnFileName;
        } else {
            // next try to get "NETBIOS-Application.png"
            $ReturnFileName = fileExists('../icon/apps/'.$RDP_FileName.'.png');
            if ($ReturnFileName !== false) {
                $FoundFile = $ReturnFileName;
            } else {
                // next try to get "Application.ico"
                $ReturnFileName = fileExists('../icon/apps/'.$ApplicationName.'.ico');
                if ($ReturnFileName !== false) {
                    $FoundFile = $ReturnFileName;
                } else {
                    // next try to get "Application.png"
                    $ReturnFileName = fileExists('../icon/apps/'.$ApplicationName.'.png');
                    if ($ReturnFileName !== false) {
                        $FoundFile = $ReturnFileName;
                    } else {
                        // Return Generic Icon
                        $FoundFile = '../icon/apps/default_online.ico';
                    }
                }
            }
        }
    } else {
        // For remote desktop
        // next try to get "NETBIOS.ico"
        $ReturnFileName = fileExists('../icon/desktops/'.$NetbiosName.'.ico');
        if ($ReturnFileName !== false) {
            $FoundFile = $ReturnFileName;
        } else {
            // next try to get "NETBIOS.png"
            $ReturnFileName = fileExists('../icon/desktops/'.$NetbiosName.'.ico');
            if ($ReturnFileName !== false) {
                $FoundFile = $ReturnFileName;
            } else {
                // Return Generic Icon
                $FoundFile = '../icon/desktops/default_online.ico';
            }
        }
    }
    return $FoundFile;
}

// check if a server is up by connecting to a port
// Usage:
// Domain Controller: chkServer("MyDC", "389");
// WebServer: chkServer("MyWebSrv", "80");
function chkServer($host, $port) {
    // resloves IP from Hostname returns hostname on failure
    $return = false;
    if (filter_var($ip_a, FILTER_VALIDATE_IP)) {
        $hostip = $host;
    } else {
        $hostip = @gethostbyname($host);
        if ($hostip == $host) {
            // if the IP is not resloved
            #echo "Server is down or does not exist";
            $return = "offline";
        }
    }

    // attempt to connect
    if (!$x = @fsockopen($hostip, $port, $errno, $errstr, 5)) {
        #echo "Server is down";
        $return = "offline";
    } else {
        #echo "Server is up";
        $return = "online";
        if ($x) {
            // if connected - close connection
            @fclose($x);
        }
    }
    return $return;
}

?>