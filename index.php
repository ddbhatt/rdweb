<?php
if(!isset($_COOKIE['CheckOnlineStatus'])) {
    $CheckOnlineStatus = false;
} else {
    $CheckOnlineStatus = $_COOKIE['CheckOnlineStatus'];
}
?>
<?php require_once 'resources/lib.php'; ?>
<html>
<head>
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="initial-scale=1.0">
	<meta name="viewport" content="user-scalable=no">

	<link rel="apple-touch-icon" href="icon/ui/rdpicon.png" />

	<!--// No Cache //-->
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Cache-Control" content="no-cache">

	<link rel="shortcut icon" type="image/ico" href="favicon.ico" />
	<title>phpRDWeb</title>

	<style type="text/css">
		a:link {color:#444444;text-decoration:none;}
		a:visited {color:#444444;text-decoration:none;}
		a:hover {color:#000000;text-decoration:none;}
		a:active {color:#000000;text-decoration:none;}
		#apptile {width:150px;height:135px;float:left;text-align:center;vertical-align:bottom;border: 1px solid #ebebeb;border-radius:8px;font-weight:bold;display:table-cell;}
		#apptile img {position:relative;top:16px;}
		#apptile #appname {position:relative;top:20px;display:block;}
		#apptile #appserver {position:relative;top:8px;display:block; font-size:10px;}
		#apptile:hover{background-color:rgb(213,242,250);border:1px solid #555;border-radius:8px;opacity:1;color:#000;}
		/* #apptile:hover{background-color:rgb(95,125,165);border:1px solid #555;border-radius:8px;opacity:1;color:#fff;} */
		h1 {font-family:Arial, Helvetica, sans-serif;font-size: 30px;font-style: italic;color:rgb(0,0,0)}
		body{font-family:Arial,sans-serif;color:#444444;font-size:14px;}
		.offline{color:red;}
		.online{color:green;}
	</style>
	<link rel="shortcut icon" href="favicon.ico">
	<script type="text/javascript">
	function setCookie(cName, cValue, exDays) {
		var d = new Date();
		d.setTime(d.getTime() + (exDays * 24 * 60 * 60 * 1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cName + "=" + cValue + "; " + expires;
	}
	function getCookie(cname) {
	    var name = cname + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0; i<ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1);
	        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	    }
	    return "";
	}
	onload=function(){
		document.getElementById('CheckOnlineStatus').checked = getCookie('CheckOnlineStatus')==1? true : false;
	}
	function set_check(){
		setCookie('CheckOnlineStatus', document.getElementById('CheckOnlineStatus').checked? 1 : 0, 30);
	}
	</script>
</head>
<body>
	<div style='text-align:left;'>
	<h1>Remote<font style='color:rgb(100,100,100)'>Apps</font>:
	<div style="float:right;margin:12px;"><a href="feed/"><img src="icon/ui/rss.png" align="bottom" style="left:8px;"></a></div>
	<div style="float:right;margin:12px;"><a href="resources/help/"><img src="icon/ui/help.png" align="bottom" style="left:8px;"></a></div>
	<div style="float:right;margin:12px;"><a href="resources/help/generator.php"><img src="icon/ui/generator.png" align="bottom" style="left:8px;"></a></div>
	</h1>
	<div style="float:right;margin:12px;"><form><input type="checkbox" id="CheckOnlineStatus" name="CheckOnlineStatus" onchange="set_check();">Check Servers Online</form></div>

	<hr size=1 />
	</div><br>

	<?php

	$dir='rdp';
	$thelist='';

	$AppRootRelativePath=$_SERVER['REQUEST_URI'];

	if (substr($AppRootRelativePath, -1) !== '/') {
		$AppRootRelativePath = dirname($AppRootRelativePath).'/';
	}

	$RdpRelativePath=$AppRootRelativePath.'rdp/';
	$IconRelativePath=$AppRootRelativePath.'icon/';

	$FQDN_PAGE="{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
	$ServerRootAbsolutePath='http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}";

	if ($handle = opendir('rdp')) {
		while (false !== ($file = readdir($handle))) {
			$filename = pathinfo($file, PATHINFO_FILENAME);
			$ext = pathinfo($file, PATHINFO_EXTENSION);
			if (strtolower($ext) === "rdp") {
				$appIsRemoteApp = GetRDPvalue('rdp/'.$file, "remoteapplicationmode:i:");
				if ("1" === "$appIsRemoteApp") {
					$appName = GetRDPvalue('rdp/'.$file, "remoteapplicationname:s:");
					$appFullAddress = GetRDPvalue('rdp/'.$file, "full address:s:"); //Usually the IP of the Server
					$appAltFullAddress = GetRDPvalue('rdp/'.$file, "alternate full address:s:"); //Usually the Name of the Server
					$pngpath = $ServerRootAbsolutePath.$AppRootRelativePath."resources/geticon.php?RDP_FileName=".$filename.'&ReturnType=PNG&ImageSize=48&RemoteType=App';
					if ("" === "$appAltFullAddress") {
						$displayServerName = $appFullAddress;
					} else {
						$displayServerName = $appAltFullAddress;
					}
					if ($CheckOnlineStatus == true) {
						$thelist .= '<a href="rdp/'.$file.'"><div id=apptile><span id=appserver class="'.chkServer($appFullAddress,"3389").'">(On: '.$displayServerName.')</span>';
					} else {
						$thelist .= '<a href="rdp/'.$file.'"><div id=apptile><span id=appserver class="online">(On: '.$displayServerName.')</span>';
					}

					$thelist .= '<img border=0 height=64 width=64 src="'.$pngpath.'"><br /><span id=appname>'.$appName.'</span>';
					$thelist .= '</div></a>';
				}
			}
		}

		closedir($handle);
	}
	?>
	<?=$thelist?>

	<div style='text-align:left;clear:both;'>
	<p>&nbsp;</p>
	<h1>Remote<font style='color:rgb(100,100,100)'>Desktops</font>:
	</h1>
	<hr size=1 />
	</div><br>

	<?php
	$thelist='';
	if ($handle = opendir('rdp')) {
		while (false !== ($file = readdir($handle))) {
			$filename = pathinfo($file, PATHINFO_FILENAME);
			$ext = pathinfo($file, PATHINFO_EXTENSION);
			if (strtolower($ext) === "rdp") {
				$appIsRemoteApp = GetRDPvalue('rdp/'.$file, "remoteapplicationmode:i:");
				if ("1" !== "$appIsRemoteApp") {
					$appFullAddress = GetRDPvalue('rdp/'.$file, "full address:s:"); //Usually the Internet URL / IP of the Server
					$appAltFullAddress = GetRDPvalue('rdp/'.$file, "alternate full address:s:"); //Usually the Name of the Server

					if ("" === "$appAltFullAddress") {
						$appAltFullAddress=$appFullAddress;
					}
					if ("" === "$appFullAddress") {
						$appFullAddress=$appAltFullAddress;
					}
					$pngpath = $ServerRootAbsolutePath.$AppRootRelativePath."resources/geticon.php?RDP_FileName=".$filename.'&ReturnType=PNG&ImageSize=48&RemoteType=Desktop';
					$ip = '';
					if(!filter_var($appFullAddress, FILTER_VALIDATE_IP)) {
						$ip = $appAltFullAddress;
						$displayServerName = $appFullAddress;
					} elseif (!filter_var($appAltFullAddress, FILTER_VALIDATE_IP)) {
						$ip = $appFullAddress;
						$displayServerName = $appAltFullAddress;
					} else {
						# No IP Available
						if ("" === "$appAltFullAddress") {
							$displayServerName = $appFullAddress;
						} else {
							$displayServerName = $appAltFullAddress;
						}
						$ip=$displayServerName;
					}

					$appName = $displayServerName;
					if ($CheckOnlineStatus == true) {
						$thelist .= '<a href="rdp/'.$file.'"><div id=apptile><span id=appserver class="'.chkServer($ip,"3389").'">(On: '.$displayServerName.')</span>';
					} else {
						$thelist .= '<a href="rdp/'.$file.'"><div id=apptile><span id=appserver class="online">(On: '.$displayServerName.')</span>';
					}
					$thelist .= '<img border=0 height=64 width=64 src="'.$pngpath.'"><br /><span id=appname>'.$appName.'</span>';
					$thelist .= '</div></a>';
				}
			}
		}

		closedir($handle);
	}

	/*
	function GetRDPvalue($f1,$valuename) {
		$valuenamelen = strlen($valuename);
		$handle = fopen($f1, "r");
		$theName='';
		if ($handle) {
			While (($line = fgets($handle)) !== false) {
				if (strlen($line) > $valuenamelen) {
					if (strtolower(substr($line,0,$valuenamelen)) === $valuename) {
						$theName=substr($line,$valuenamelen,strlen($line));
					}
				}
			}
			$theName = str_replace("|","",$theName);
			return trim($theName);
		} else {
			return "";
		}
		fclose($handle);
	}
	*/

	?>

	<?=$thelist?>
</body>
</html>