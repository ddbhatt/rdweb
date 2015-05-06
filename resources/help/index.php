<?php
ob_start;
# Goal: Create a RDP and Reg file Generator for Application
$NEW_LINE="\r\n";
if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'):

	$appServerHostType=isset($_POST['appServerHostType']) ? $_POST['appServerHostType'] : '';
$appServerName=isset($_POST['appServerName']) ? $_POST['appServerName'] : '';
$appServerLocalIP=isset($_POST['appServerLocalIP']) ? $_POST['appServerLocalIP'] : '';
$appName=isset($_POST['appName']) ? $_POST['appName'] : '';
$appLocalPath=isset($_POST['appLocalPath']) ? $_POST['appLocalPath'] : '';
$appArguments=isset($_POST['appArguments']) ? $_POST['appArguments'] : '';
$appIcon='';

if (("$appServerName" === "") || ("$appServerLocalIP" === "") || ("$appName" === "") || ("$appLocalPath" === "")) {
  echo "Require: Remote Server Name, Remote Server's Local IP, Application Name, Application Local Path on Remote Server to generate files";
  exit;
}

if (isset($_POST['regFile'])) {
  if ("$appServerHostType"==="WinXP") {
     header('Content-type: text/plain');
     header('Content-type: application/force-download');
     header('Content-Disposition: attachment; filename="'.$appServerName.'-'.$appName.'.reg"');
     header('Content-Transfer-Encoding: binary');

     echo "Windows Registry Editor Version 5.00".$NEW_LINE;
     echo "".$NEW_LINE;
     if ("$appServerHostType" === "WinXP") {
        echo "[HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Terminal Server\TSAppAllowList]".$NEW_LINE;
        echo '"fDisabledAllowList"=dword:00000001'.$NEW_LINE;
        echo ''.$NEW_LINE;
    }
    echo '[HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Terminal Server\TSAppAllowList\Applications\\'.$appServerName.'-'.$appName.']'.$NEW_LINE;
    echo '"CommandLineSetting"=dword:00000000'.$NEW_LINE;
    echo '"RequiredCommandLine"=""'.$NEW_LINE;
    echo '"IconIndex"=dword:00000000'.$NEW_LINE;
    echo '"IconPath"=""'.$NEW_LINE;
    echo '"Path"="'.addslashes($appLocalPath).'"'.$NEW_LINE;
    echo '"VPath"="'.addslashes($appLocalPath).'"'.$NEW_LINE;
    echo '"ShowInTSWA"=dword:00000001'.$NEW_LINE;
    echo '"Name"="'.$appName.'"'.$NEW_LINE;
    echo '"SecurityDescriptor"=""'.$NEW_LINE;
} else {
 echo "You Do not need to generate Registry Files to configure RemoteApps for Windows Servers";
}
}
if (isset($_POST['rdpFile'])) {
  header('Content-type: text/plain');
  header('Content-type: application/force-download');
  header('Content-Disposition: attachment; filename="'.$appServerName.'-'.$appName.'.rdp"');
  header('Content-Transfer-Encoding: binary');

		#-- RemoteApp Settings
  echo 'remoteapplicationname:s:'.$appName.$NEW_LINE;
  echo 'remoteapplicationprogram:s:||'.$appServerName.'-'.$appName.$NEW_LINE;
  echo 'remoteapplicationicon:s:\\\\DiskStation\Web\apps\rdweb\icon\\'.$appServerName.'-'.$appName.'.ico'.$NEW_LINE;
  if ("$appServerHostType"==="WinXP") {
     echo 'remoteapplicationcmdline:s:'.$NEW_LINE;
 } else {
     echo 'remoteapplicationcmdline:s:'.$appLocalPath.$NEW_LINE;
 }
 echo 'remoteapplicationfile:s:'.$NEW_LINE;
 echo 'redirectclipboard:i:1'.$NEW_LINE;
 echo 'redirectdirectx:i:1'.$NEW_LINE;
 echo 'redirectprinters:i:1'.$NEW_LINE;

		#-- Server Address
 echo 'full address:s:'.$appServerLocalIP.$NEW_LINE;
 echo 'alternate full address:s:'.$appServerName.$NEW_LINE;

		#-- Required for RemoteApps
 echo 'remoteapplicationmode:i:1'.$NEW_LINE;
 if ("$appServerHostType"==="WinXP") {
			echo 'disableremoteappcapscheck:i:1'.$NEW_LINE;		# --- required for WinXP Host
			echo 'alternate shell:s:rdpinit.exe'.$NEW_LINE;		# --- required for WinXP Host else same as remoteapplicationprogram for servers
		} else {
			echo 'alternate shell:s:'.$appLocalPath.$NEW_LINE;	# --- required for WinXP Host else same as remoteapplicationprogram for servers
		}

		#-- If credentials do not exist then prompt on client
		echo 'prompt for credentials on client:i:1'.$NEW_LINE;
		echo 'promptcredentialonce:i:0'.$NEW_LINE;

		#-- User Stored Authentication
		if (1==2) {
			echo 'username:s:RemoteUser'.$NEW_LINE;
			echo 'password 51:b:'.$NEW_LINE;
		}

		#-- Run in FullScreen Mode, Connection Type Lan
		echo 'screen mode id:i:2'.$NEW_LINE;
		echo 'connection type:i:5'.$NEW_LINE;

		echo 'allow font smoothing:i:1'.$NEW_LINE;
		echo 'disable cursor setting:i:0'.$NEW_LINE;

		#-- Redirect Drives
		echo 'drivestoredirect:s:*'.$NEW_LINE;

		#-- Enable Multi Monitor Support (Without this the window will stay only on one monitor)
		if (1==1) {
			echo 'span monitors:i:1'.$NEW_LINE;
			echo 'use multimon:i:1'.$NEW_LINE;
		}

		#-- Console / Admin Mode to Desktop0
		if (1==2) {
			echo 'administrative session:i:1'.$NEW_LINE;
			echo 'connect to console:i:1'.$NEW_LINE;
		}

	}

    $dummyVar='';
    else: ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
    <head>
      <title>phpRDWeb - Help - Generator for REG & RDP Files</title>
      <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <style type="text/css">
        @import url(http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);
        body {
          background-color: #3e94ec;
          font-family: "Roboto", helvetica, arial, sans-serif;
          font-size: 16px;
          font-weight: 400;
          text-rendering: optimizeLegibility;
      }
.input-txtLine {
transition: all .2s linear;
-webkit-appearance: none;
background: #fff;
border: 2px solid #cbd2d6;
border: 2px solid rgba(0,39,59,.2);
padding: 5px 9px;
margin: 0;
border-radius: 4px;
width: 100%;
font-size: 13px;
height: 32px;
}
      div.table-title {
         display: block;
         margin: auto;
         /*max-width: 600px;*/
         max-width: 100%;
         padding:5px;
         width: 100%;
     }

     .table-title h3 {
         color: #fafafa;
         font-size: 30px;
         font-weight: 400;
         font-style:normal;
         font-family: "Roboto", helvetica, arial, sans-serif;
         text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
         text-transform:uppercase;
     }


     /*** Table Styles **/

     .table-fill {
      background: white;
      border-radius:3px;
      border-collapse: collapse;
      height: 320px;
      margin: auto;
/*max-width: 600px;*/
         max-width: 100%;
      padding:5px;
      width: 100%;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      animation: float 5s infinite;
  }

  th {
      color:#D5DDE5;;
      background:#1b1e24;
      border-bottom:4px solid #9ea7af;
      border-right: 1px solid #343a45;
      font-size:23px;
      font-weight: 100;
      padding:24px;
      text-align:left;
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      vertical-align:middle;
  }

  th:first-child {
      border-top-left-radius:3px;
  }

  th:last-child {
      border-top-right-radius:3px;
      border-right:none;
  }

  tr {
      border-top: 1px solid #C1C3D1;
      border-bottom-: 1px solid #C1C3D1;
      color:#666B85;
      font-size:16px;
      font-weight:normal;
      text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
  }

  tr:hover td {
      background:#4E5066;
      color:#FFFFFF;
      border-top: 1px solid #22262e;
      border-bottom: 1px solid #22262e;
  }

  tr:first-child {
      border-top:none;
  }

  tr:last-child {
      border-bottom:none;
  }

  tr:nth-child(odd) td {
      background:#EBEBEB;
  }

  tr:nth-child(odd):hover td {
      background:#4E5066;
  }

  tr:last-child td:first-child {
      border-bottom-left-radius:3px;
  }

  tr:last-child td:last-child {
      border-bottom-right-radius:3px;
  }

  td {
      background:#FFFFFF;
      padding:20px;
      text-align:left;
      vertical-align:middle;
      font-weight:300;
      font-size:18px;
      text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
      border-right: 1px solid #C1C3D1;
  }

  td:last-child {
      border-right: 0px;
  }

  th.text-left {
      text-align: left;
  }

  th.text-center {
      text-align: center;
  }

  th.text-right {
      text-align: right;
  }

  td.text-left {
      text-align: left;
  }

  td.text-center {
      text-align: center;
  }

  td.text-right {
      text-align: right;
  }
.rdp_file {
    background: url(../../icon/ui/rdp_file.png);
    border: 0;
    display: block;
    height: 64;
    width: 64;
    float: right;
    padding:24px;
    cursor: hand;
}
.reg_file {
    background: url(../../icon/ui/reg_file.png);
    border: 0;
    display: block;
    height: 64;
    width: 64;
    float: right;
    padding:24px;
    cursor: hand;
}
.reg_file_delete {
    background: url(../../icon/ui/reg_file_delete.png);
    border: 0;
    display: block;
    height: 64;
    width: 64;
    float: right;
    padding:24px;
    cursor: hand;
}
.reset_form {
    background: url(../../icon/ui/reset_form.png);
    border: 0;
    display: block;
    height: 64;
    width: 64;
    float: left;
    padding:24px;
    cursor: hand;
}
</style>
</head>

<body>
    <div class="table-title">
        <h3>RDP & REG Files Generator:</h3>
        Generate Windows Registry Files and RDP Files for your Host PC
    </div>
<hr size="2" />
    <form method="post" action="<?php echo $PHP_SELF;?>" accept-charset="utf-8">
        <table class="table-fill">
            <thead>
              <tr>
                <th class="text-left" colspan="2">Keys</th>
                <th class="text-left">Values</th>
                <th class="text-left">Notes</th>
            </tr>
        </thead>
        <tbody class="table-hover">
          <tr>
            <td class="text-left">Host OS Type</td>
            <td class="text-left">:</td>
            <td class="text-left"><input type="radio" value="WinXP" name="appServerHostType" checked> Windows XP SP3 / Vista / Windows 7 Ultimate<br /><input type="radio" value="WinServer" name="appServerHostType"> Windows Server 2008 / 2012</td></td>
            <td class="text-left">Will Not work for Windows 8.1 Professional</td>
        </tr>
        <tr>
            <td class="text-left">Host's Netbios Name</td>
            <td class="text-left">:</td>
            <td class="text-left"><input type="text" size="12" name="appServerName" class="input-txtLine"></td>
            <td class="text-left">E.g. WorkPC</td>
        </tr>
        <tr>
            <td class="text-left">Host's Local IP / Internet URL</td>
            <td class="text-left">:</td>
            <td class="text-left"><input type="text" size="12" name="appServerLocalIP" class="input-txtLine"></td>
            <td class="text-left">E.g. 192.168.0.2 OR workpc.no-ip.org:50000 </td>
        </tr>
        <tr>
            <td class="text-left">Application Name</td>
            <td class="text-left">:</td>
            <td class="text-left"><input type="text" size="12" name="appName" class="input-txtLine"></td>
            <td class="text-left">E.g. Notepad</td>
        </tr>
        <tr>
            <td class="text-left">Application Path (On Host)</td>
            <td class="text-left">:</td>
            <td class="text-left"><input type="text" size="12" name="appLocalPath" class="input-txtLine"></td>
            <td class="text-left">E.g. C:\Windows\System32\notepad.exe</td>
        </tr>
        <tr>
            <td class="text-left">Application Arguments</td>
            <td class="text-left">:</td>
            <td class="text-left"><input type="text" size="12" name="appArguments" class="input-txtLine"></td>
            <td class="text-left">E.g. C:\log.txt</td>
        </tr>
        <tr>
            <td class="text-left">Upload Application to extract Icon (TODO)</td>
            <td class="text-left">:</td>
            <td class="text-left"><input type="file" name="appIcon" /></td>
            <td class="text-left">&nbsp;</td>
        </tr>
    </tbody>
    <thead>
        <tr>
            <th class="text-left" colspan="2"> <input type="reset" value="" class="reset_form"></th>
            <th class="text-left">&nbsp;</th>
            <th class="text-left"><input type="submit" name="rdpFile" value="" class="rdp_file" />
            <input type="submit" name="regFile" value="" class="reg_file" /></th>
            <input type="submit" name="regFile_delete" value="" class="reg_file_delete" /></th>
        </tr>
    </thead>
</table>
</form>
<div class="table-title">
  <h3>Installation Notes:</h3>
</div>
<hr size="2" />
<div class="">
<pre>
  Steps:
    1) Enable RemoteApp Hosting by Tweaking Registry (<a href="fDisabledAllowList.reg">Download Registry 5.0 File</a>)
    2) Enable Concurrent User Logins
    3) Enable Concurrent Remote Desktop Sessions
            (<a href="tools/UniversalTermsrvPatch_20090425.zip">Download UniversalTermsrvPatcher for XP, Vista & 7</a>)
            (<a href="tools/fSingleSessionPerUser.reg">Download Registry 5.0 File for Windows 8</a>)
            (<a href="tools/TermsrvPatchedWin81.zip">Download Patched Windows 8.1 termsrv.dll</a>)
            (<a href="tools/windows_8_multiple_rdp_exe.zip">Download Patcher for Windows 8 </a>)

  For further customizations:
    1) <a href="rdp-file-defination.php">Overview of .rdp file settings</a>
    2) <a href="registry-keys-for-terminal-services.php">Registry Keys for Terminal Services</a>
    3) <a href="concurrent.php">Enable Concurrent Remote Desktop Sessions in Windows XP / 7 / 8 / 8.1</a>
    4) <a href="https://technet.microsoft.com/en-in/library/cc755261.aspx">RemoteApp Manager</a>

  Remote App Tool: (curtesy <a href="http://www.kimknight.net/">Kim Knight</a>)
    <a href="RemoteAppTool_v4025.zip">Remote App Tool</a>
    <a href="raweb0040.zip">Remote App Web</a>

  Fill In the form and click the RDP Icon to download RDP File, then Click the Reg Icon to download the regfile, Then click the Remove Reg Icon to download the Remove Reg File.

  After downloading the files, copy the files to rdp folder of your rdweb.

  You need to extract the Application ICO file and put it in the icon/apps folder for Applications and icon/desktops folder for Desktops.

  <strong>You need to run the Downloaded Reg file on the Host PC.</strong>
</pre>
</div>


</body>
</html>
<?php endif; ?>