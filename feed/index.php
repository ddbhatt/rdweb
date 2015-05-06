<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('html_errors', 'On');

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

require_once '../resources/lib.php';

$dir='../rdp';

// Get Current HostName -- Change to point it to Windows RemoteApp Host System
$ServerName = "Synology";//gethostname();

// Set DateTime to server's TimeZone -- Zulu
date_default_timezone_set('Asia/Calcutta');
// Get Last Modified DateTime
$date = new DateTime(); #new DateTime('now');
$date->setTimeStamp(filemtime('../rdp/'));
// Change the Current DateTime's TimeZone to target TimeZone, in  this case Zulu
$date->setTimezone(new DateTimeZone('UTC'));
// Get the String in Required Format
$LastDatetime = $date->format('Y-m-d\TH:i:s.u\Z');

// Reset Default Server Datetime -- Not required but good to do.
date_default_timezone_set('Asia/Calcutta');

$AppRootRelativePath=$_SERVER['REQUEST_URI'];

if (substr($AppRootRelativePath, -1) !== '/') {
	$AppRootRelativePath = dirname($AppRootRelativePath).'/';
}
$AppRootRelativePath=dirname($AppRootRelativePath).'/';

$RdpRelativePath=$AppRootRelativePath.'rdp/';
$IconRelativePath=$AppRootRelativePath.'icon/';

$FQDN_PAGE="{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
$ServerRootAbsolutePath='http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}";
$AppRootAbsolutePath=$ServerRootAbsolutePath.$AppRootRelativePath;

#$FQURL = $_SERVER['HTTP_HOST'].$AppRootRelativePath;
#scheme://username:password@domain:port/path?query_string

header('Content-type: text/xml');

echo('<?xml version="1.0" encoding="utf-8" ?>'.PHP_EOL);
echo('<ResourceCollection PubDate="'.$LastDatetime.'" SchemaVersion="2.1" xmlns="http://schemas.microsoft.com/ts/2007/05/tswf">'.PHP_EOL);
echo('<Publisher LastUpdated="'.$LastDatetime.'" Name="Remote Desktop Services - '.$ServerName.'" ID="'.$FQDN_PAGE.'" Description="RDWeb on '.$ServerName.' pointing to Resources in IntraNET" SupportsReconnect="false">'.PHP_EOL);
#DisplayFolder="str1234"
#    <SubFolders>
#      <Folder Name="str1234" />
#    </SubFolders>
echo("<Resources>".PHP_EOL);

$TermServers= array();

	if ($handle = opendir('../rdp/')) {
		while (false !== ($file = readdir($handle))) {
			$filename = pathinfo($file, PATHINFO_FILENAME);
			$ext = pathinfo($file, PATHINFO_EXTENSION);
			if (strtolower($ext) === "rdp") {
				$appIsRemoteApp = GetRDPvalue('../rdp/'.$file, "remoteapplicationmode:i:");

				# if ("1" !== "$appIsRemoteApp") {
					$appAlias = GetRDPvalue('../rdp/'.$file,"remoteapplicationprogram:s:");
					$appTitle = GetRDPvalue('../rdp/'.$file,"remoteapplicationname:s:");


					$appRdpFile = $file;
					$appFtaString = GetRDPvalue('../rdp/'.$file, "remoteapplicationfileextensions:s:");
					$appFullAddress = GetRDPvalue('../rdp/'.$file, "full address:s:");
					$appAltFullAddress = GetRDPvalue('../rdp/'.$file, "alternate full address:s:");

					// Icons

					if ($appIsRemoteApp==1) {
						$appResourceType='RemoteApp';
						$IconPNG = $AppRootAbsolutePath . 'geticon.php?RDP_FileName='.$filename.'&amp;ReturnType=PNG&amp;ImageSize=32&amp;RemoteType=App';
						$IconICO = $AppRootAbsolutePath . 'feed/' . GetAvailableIcoFile($filename, 'App'); //'geticon.php?RDP_FileName='.pathinfo($appRdpFile, PATHINFO_FILENAME).'&amp;ReturnType=ICO&amp;ImageSize=32&amp;RemoteType=App';
					} else {
						$appResourceType='Desktop';

						$appTitle = $filename;
						$appAlias = $appTitle;

						$IconPNG = $AppRootAbsolutePath . 'geticon.php?RDP_FileName='.$filename.'&amp;ReturnType=PNG&amp;ImageSize=32&amp;RemoteType=Desktop';
						$IconICO = $AppRootAbsolutePath . 'feed/' . GetAvailableIcoFile($filename, 'Desktop'); //'geticon.php?RDP_FileName='.pathinfo($appRdpFile, PATHINFO_FILENAME).'&amp;ReturnType=ICO&amp;ImageSize=32&amp;RemoteType=Desktop';
					}
					/*
					$appIcon = '';
					if ($appIsRemoteApp==1) {
						$appResourceType='RemoteApp';
						if (file_exists('../icon/apps/'.$filename.'.ico')) {
							$appIcon = $filename.'.ico';
						} else {
							if (file_exists('../icon/apps/'.substr($filename, strrpos($filename, "-")+1).'.ico')) {
								$appIcon = $filename.'.ico';
							} else {
								$appIcon = "remoteapp_default_online.ico";
							}
						}
					} else {
						$appResourceType='Desktop';

						$appTitle = $filename;
						$appAlias = $appTitle;

						if (file_exists('../icon/desktop/'.$filename.'.ico')) {
							$appIcon = $filename.'.ico';
						} else {
							$appIcon = "remotedesktop_default_online.ico";
						}
					}
					*/

					if (!in_array($appAltFullAddress, $TermServers)) {
					    array_push($TermServers, $appAltFullAddress);
					}

					$appResourceId = "{$_SERVER['HTTP_HOST']}".$AppRootRelativePath.'rdp/'.$filename.'.'.$ext;

					$fileDateTimeRAW = new DateTime('@'.filemtime('../rdp/'.$file));
					$fileDateTimeRAW->setTimezone(new DateTimeZone('UTC'));
					$fileDateTime = $fileDateTimeRAW->format('Y-m-d\TH:i:s.u\Z');

					echo('<Resource ID="'.$appResourceId.'" Alias="'.$appAlias.'" Title="'.$appAltFullAddress."-".$appTitle.'" LastUpdated="'.$fileDateTime.'" Type="'.$appResourceType.'" ShowByDefault="true">'.PHP_EOL);
					#RequiredCommandLine="str1234" ExecutableName="str1234"
					echo("<Icons>".PHP_EOL);
					echo('<IconRaw FileType="Ico" FileURL="'.$IconICO.'" />'.PHP_EOL);
					echo('<Icon32 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=32&amp;RemoteType=App'.'" />'.PHP_EOL);
					echo('<Icon48 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=48&amp;RemoteType=App'.'" />'.PHP_EOL);
					echo('<Icon64 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=64&amp;RemoteType=App'.'" />'.PHP_EOL);
					echo('<Icon128 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=128&amp;RemoteType=App'.'" />'.PHP_EOL);
					echo('<Icon256 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=256&amp;RemoteType=App'.'" />'.PHP_EOL);
					echo("</Icons>".PHP_EOL);
					if ($appFtaString !== "") {
						echo("<FileExtensions>".PHP_EOL);
						#$appFtaArray = str_getcsv($appFtaString,",")
						$appFtaArray = explode(',', $appFtaString);
						foreach ($appFtaArray as $fileType) {
							$docicon = $filename.$fileType.".ico";
							echo('<FileExtension Name="'.$fileType.'" PrimaryHandler="True">'.PHP_EOL);
							echo("<FileAssociationIcons>".PHP_EOL);
							echo('<IconRaw FileType="Ico" FileURL="'.$IconICO.'" />'.PHP_EOL);
							//echo('<IconRaw FileType="Ico" FileURL="'.$IconRelativePath.$docicon.'" />'.PHP_EOL);
							//echo('<Icon32 FileType="Png" FileURL="'.$IconRelativePath.$appIcon.'.png'.'" />'.PHP_EOL);
							echo('<Icon32 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=32&amp;RemoteType=App'.'" />'.PHP_EOL);
							echo('<Icon48 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=48&amp;RemoteType=App'.'" />'.PHP_EOL);
							echo('<Icon64 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=64&amp;RemoteType=App'.'" />'.PHP_EOL);
							echo('<Icon128 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=128&amp;RemoteType=App'.'" />'.PHP_EOL);
							echo('<Icon256 FileType="Png" FileURL="'.$AppRootAbsolutePath.'resources/geticon.php?RDP_FileName='.$appTitle.'&amp;ReturnType=PNG&amp;ImageSize=256&amp;RemoteType=App'.'" />'.PHP_EOL);
							echo("</FileAssociationIcons>".PHP_EOL);
							echo("</FileExtension>".PHP_EOL);
						}
						echo("</FileExtensions>".PHP_EOL);
					} else {
						echo("<FileExtensions />".PHP_EOL);
					}
					echo("<HostingTerminalServers>".PHP_EOL);
					echo("<HostingTerminalServer>".PHP_EOL);
					echo('<ResourceFile FileExtension=".rdp" URL="'.$RdpRelativePath.$appRdpFile.'" />'.PHP_EOL);
					echo('<TerminalServerRef Ref="'.$appAltFullAddress.'" />'.PHP_EOL);
					echo("</HostingTerminalServer>".PHP_EOL);
					echo("</HostingTerminalServers>".PHP_EOL);
					echo("</Resource>".PHP_EOL);
				# }
			}
		}

		closedir($handle);
	}

echo("</Resources>".PHP_EOL);
echo("<TerminalServers>".PHP_EOL);

foreach ( $TermServers as $TermServer ) {
	echo('<TerminalServer ID="'.$TermServer.'" Name="'.$TermServer.'" LastUpdated="'.$LastDatetime.'" />'.PHP_EOL);
}
echo("</TerminalServers>".PHP_EOL);
echo("</Publisher>".PHP_EOL);
echo("</ResourceCollection>".PHP_EOL);

?>