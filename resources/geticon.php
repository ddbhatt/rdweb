<?php
require_once 'lib.php';


    // Parse QueryString
    if (! is_null($_GET['RDP_FileName']) ) {
        $RDP_FileName = $_GET['RDP_FileName'];
    }

    if (! is_null($_GET['ReturnType']) ) {
        $ReturnType = $_GET['ReturnType'];
    } else {
        $ReturnType = 'PNG';
    }

    if (! is_null($_GET['ImageSize']) ) {
        $ImageSize = $_GET['ImageSize'];
    } else {
        $ImageSize = '0'; // Largest Available
    }

    if (! is_null($_GET['RemoteType']) ) {
        $RemoteType = $_GET['RemoteType'];
    } else {
        $RemoteType = 'App';
    }

    if (! is_null($_GET['URL']) ) {
        $SendURL = true;
    } else {
        $SendURL = false;
    }

    if (! is_null($_GET['FILENAME']) ) {
        $SendFileName = true;
    } else {
        $SendFileName = false;
    }

    $AppRootRelativePath=$_SERVER['REQUEST_URI'];
    if (substr($AppRootRelativePath, -1) !== '/') {
        $AppRootRelativePath = dirname($AppRootRelativePath).'/';
    }
    $ServerRootAbsolutePath='http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}";

    $IconFile = GetAvailableIcoFile($RDP_FileName, $RemoteType);

    if ($SendFileName) {
        echo($IconFile);
        exit;
    } elseif ($SendURL) {
        echo $ServerRootAbsolutePath . $AppRootRelativePath . $IconFile;
        exit;
    } else {
        $ico = new Ico($IconFile);
    }

	$ico->SetBackgroundTransparent();

    // Icon to PNG
    $im = $ico->TryGetExactSizeIcon($ImageSize);
    if (is_null($im)) {
        $im = $ico->GetLargestIcon();
    }

    // Check Return Size
    $AvailableImageSizeWidth = imagesx($im);
    $AvailableImageSizeHeight = imagesy($im);

    if (intval($AvailableImageSizeWidth) !== intval($ImageSize)) {
        $ReturnImage = resizePng($im, $ImageSize, $ImageSize);
    } else {
        $ReturnImage = $im;
    }

    //imagealphablending($ReturnImage, false);
    //imagesavealpha($ReturnImage, true);

    header('Content-Type: image/png');
	// imagepng($im);
    imagepng($ReturnImage, null, 9);
    imagedestroy($im);
    imagedestroy($ReturnImage);
?>

