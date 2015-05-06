<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head>
	<title>phpRDWeb - Overview of .rdp file settings</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<style id="settings">
			td {
				vertical-align: top;
				border:1pt solid #888888;
			}
			td.centered {
				text-align: center;
			}
			
			tr.header {
				font-weight: bold;
				background: #992222;
			}
	</style>
	</head>
	<body style="font-size: 9pt ! important;">
		<div>
			Source: <a href="http://www.donkz.nl/files/rdpsettings.html">http://www.donkz.nl/files/rdpsettings.html</a><br /><br />
			Additional Resources:<br />
			<li><a href="http://technet.microsoft.com/en-us/library/ff393699(WS.10).aspx">RDP Settings for Remote Desktop Services in Windows Server 2008 R2</a><br />
			<li><a href="http://support.microsoft.com/kb/885187">Remote Desktop Protocol settings in Windows Server 2003 and in Windows XP</a><br />
		</div>
		<div id="container" align="center">
			<h3>Overview of .rdp file settings</h3>
			<p></p>
			<table style="border-collapse: collapse; table-layout: fixed;" cellpadding="5" cellspacing="0">
				<col width="210" />
				<col width="40" />
				<col width="110" />
				<col width="660" />
				<col width="100" />
				<col width="150" />
				<tbody>
				<tr class="header">
					<td>Setting</td>
					<td>Type</td>
					<td>Default value</td>
					<td>Description and possible values</td>
					<td>Settable from RDC GUI?</td>
					<td>RDP+ equivalent</td>
					<td>5.1</td>
					<td>5.2</td>
					<td>6.0</td>
					<td>6.1</td>
					<td>7.0</td>
					<td>7.1</td>
					<td>8.0</td>
				</tr>
				<tr>
					<td>administrative session<br /></td>
					<td>i</td>
					<td>0</td>
					<td>
						Connect to the administrative session of the remote computer.<br />
						<br />
						0 - Do not use the administrative session.<br />
						1 - Connect to the administrative session.
					</td>
					<td>Command line</td>
					<td>/console, /admin</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
			</tr>
				<tr>
					<td>allow desktop composition</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether desktop composition (needed for Aero) is permitted when you log on to the remote computer.<br />
						<br />
						0 - Disable desktop composition in the remote session.<br />
						1 - Desktop composition is permitted.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>allow font smoothing</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether font smoothing may be used in the remote session.<br />
						<br />
						0 - Disable font smoothing in the remote session.<br />
						1 - Font smoothing is permitted.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>alternate full address</td>
					<td>s</td>
					<td></td>
					<td>
						Specifies an alternate name or IP address of the remote computer that you want to connect to.<br />
						<br />
						Will be overruled by RDP+.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>alternate shell</td>
					<td class="feature-text">s</td>
					<td></td>
					<td>
						Specifies a program to be started automatically when you connect to a remote computer. The value should be a valid path to an executable file.<br />
						This setting only works when connecting to servers.
					</td>
					<td>Yes</td>
					<td>/start</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>audiocapturemode</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines how sounds captured (recorded) on the local computer are handled when you are connected to the remote computer.<br />
						<br />
						0 - Do not capture audio from the local computer.<br />
						1 - Capture audio from the local computer and send to the remote computer.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>audiomode </td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines how sounds on a remote computer are handled when you are connected to the remote computer.<br />
						<br />
						0 - Play sounds on the local computer.<br />
						1 - Play sounds on the remote computer.<br />
						2 - Do not play sounds.
					</td>
					<td>Yes</td>
					<td>/[no]sound</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>audioqualitymode</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines the quality of the audio played in the remote session.<br />
						<br />
						0 - Dynamically adjust audio quality based on available bandwidth.<br />
						1 - Always use medium audio quality.<br />
						2 - Always use uncompressed audio quality.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>authentication level</td>
					<td>i</td>
					<td>2</td>
					<td>
						Determines what should happen when server authentication fails.<br />
						<br />
						0 - If server authentication fails, connect without giving a warning.<br />
						1 - If server authentication fails, do not connect.<br />
						2 - If server authentication fails, show a warning and allow the user to connect or not.<br />
						3 - Server authentication is not required.<br />
						<br />
						This setting will be overruled by RDP+.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>autoreconnect max retries</td>
					<td>i</td>
					<td>20</td>
					<td>
						Determines the maximum number of times the client computer will try to reconnect to the remote computer if the connection is dropped.<br />
						Note: The maximum value Remote Desktop can handle is 200.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>autoreconnection enabled</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether the client computer will automatically try to reconnect to the remote computer if the connection is dropped.<br />
						<br />
						0 - Do not attempt to reconnect.<br />
						1 - Attempt to reconnect.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>bitmapcachepersistenable</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether bitmaps are cached on the local computer (disk-based cache). Bitmap caching can improve the performance of your remote session.<br />
						<br />
						0 - Do not cache bitmaps.<br />
						1 - Cache bitmaps.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>bitmapcachesize</td>
					<td>i</td>
					<td>1500</td>
					<td>
						Specifies the size in kilobytes of the memory-based bitmap cache. The maximum value is 32000.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>compression </td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether the connection should use bulk compression. <br />
						<br />
						0 - Do not use bulk compression.<br />
						1 - Use bulk compression.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>connect to console</td>
					<td>i</td>
					<td>0</td>
					<td>
						Connect to the console session of the remote computer.<br />
						<br />
						0 - Connect to a normal session.<br />
						1 - Connect to the console screen.
					</td>
					<td>Command line</td>
					<td>/console, /admin</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
				</tr>
				<tr>
					<td>connection type</td>
					<td>i</td>
					<td>2</td>
					<td>
						Specifies pre-defined performance settings for the Remote Desktop session.<br />
						<br />
						1 - Modem (56 Kbps).<br />
						2 - Low-speed broadband (256 Kbps - 2 Mbps).<br />
						3 - Satellite (2 Mbps - 16 Mbps with high latency).<br />
						3 - High-speed broadband (2 Mbps - 10 Mbps).<br />
						4 - WAN (10 Mbps or higher with high latency).<br />
						5 - LAN (10 Mbps or higher).<br />
						<br />
						By itself, this setting does nothing. When selected in the RDC GUI, this option changes several performance related settings (themes, animation, font smoothing, etcetera). These separate settings always overrule the connection type setting.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>desktopheight</td>
					<td>i</td>
					<td>600</td>
					<td>
						The height (in pixels) of the remote session desktop.
					</td>
					<td>Limited</td>
					<td>/h</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>desktop size id</td>
					<td>i</td>
					<td>0</td>
					<td>
						Specifies pre-defined dimensions of the remote session desktop.<br />
						<br />
						0 - 640x480.<br />
						1 - 800x600.<br />
						2 - 1024x768.<br />
						3 - 1280x1024.<br />
						4 - 1600x1200.<br />
						<br />
						This setting is ignored when either /w and /h, or <b>desktopwidth</b> and <b>desktopheight</b> are already specified.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>desktopwidth</td>
					<td>i</td>
					<td>800</td>
					<td>
						The width (in pixels) of the remote session desktop.
					</td>
					<td>Limited</td>
					<td>/w</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>devicestoredirect</td>
					<td>s</td>
					<td></td>
					<td>
						Determines which supported Plug and Play devices on the client computer will be redirected and available in the remote session.<br />
						<br />
						No value specified - Do not redirect any supported Plug and Play devices.<br />
						* - Redirect all supported Plug and Play devices, including ones that are connected later.<br />
						DynamicDevices - Redirect any supported Plug and Play devices that are connected later.<br />
						The hardware ID for one or more Plug and Play devices - Redirect the specified supported Plug and Play device(s).
					</td>
					<td>Yes</td>
					<td>/[no]drives</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>disable ctrl+alt+del</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether you have to press CTRL+ALT+DELETE before entering credentials after you are connected to the remote computer.<br />
						<br />
						0 - CTRL+ALT+DELETE is required before logging in.<br />
						1 - CTRL+ALT+DELETE is not required. You can logon immediately.<br />
						<br />
						Note: When disabled, this setting will also delay the autologin until the user has pressed CTRL+ALT+DELETE.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>disable full window drag</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether window content is displayed when you drag the window to a new location.<br />
						<br />
						0 - Show the contents of the window while dragging.<br />
						1 - Show an outline of the window while dragging.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>disable menu anims</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether menus and windows can be displayed with animation effects in the remote session.<br />
						<br />
						0 - Menu and window animation is permitted.<br />
						1 - No menu and window animation.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>disable themes </td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether themes are permitted when you log on to the remote computer.<br />
						<br />
						0 - Themes are permitted. <br />
						1 - Disable theme in the remote session. 
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>disable wallpaper</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether the desktop background is displayed in the remote session.<br />
						<br />
						0 - Display the wallpaper.<br />
						1 - Do not show any wallpaper.
					</td>
					<td>Yes</td>
					<td>/[no]wallpaper</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>disableconnectionsharing</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether a new Terminal Server session is started with every launch of a RemoteApp to the same computer and with the same credentials.<br />
						<br />
						0 - No new session is started. The currently active session of the user is shared.<br />
						1 - A new login session is started for the RemoteApp.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>disableremoteappcapscheck</td>
					<td>i</td>
					<td>0</td>
					<td>
						Specifies whether the Remote Desktop client should check the remote computer for RemoteApp capabilities.<br />
						0 - Check the remote computer for RemoteApp capabilities before logging in.<br />
						1 - Do not check the remote computer for RemoteApp capabilities.<br />
						<br />
						Note: This setting must be set to 1 when connecting to Windows XP SP3, Vista or 7 computers with RemoteApps configured on them. This is the default behavior of RDP+. 
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>displayconnectionbar
					</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether the connection bar appears when you are in full screen mode.<br />
						<br />
						0 - Do not show the connection bar.<br />
						1 - Show the connection bar.<br />
						<br />
						Will be overruled by RDP+ when using the parameter /noclose.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>domain </td>
					<td>s</td>
					<td></td>
					<td>
						Specifies the name of the domain of the user.<br />
						<br />
						Will be ignored/overruled by RDP+.
					</td>
					<td>Yes</td>
					<td>/u, /domain</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>drivestoredirect</td>
					<td>s</td>
					<td></td>
					<td>
						Determines which local disk drives on the client computer will be redirected and available in the remote session.<br />
						<br />
						No value specified - Do not redirect any drives.<br />
						* - Redirect all disk drives, including drives that are connected later.<br />
						DynamicDrives - Redirect any drives that are connected later.<br />
						The drive and labels for one or more drives - Redirect the specified drive(s).
					</td>
					<td>Yes</td>
					<td>/[no]drives</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>enablecredsspsupport</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether Remote Desktop will use CredSSP for authentication if it’s available.<br />
						<br />
						0 - Do not use CredSSP, even if the operating system supports it.<br />
						1 - Use CredSSP, if the operating system supports it.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>enablesuperpan</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether SuperPan is enabled or disabled. SuperPan allows the user to navigate a remote desktop in full-screen mode without scroll bars, when the dimensions of the remote desktop are larger than the dimensions of the current client window. The user can point to the window border, and the desktop view will scroll automatically in that direction.<br />
						<br />
						0 - Do not use SuperPan. The remote session window is sized to the client window size.<br />
						1 - Enable SuperPan. The remote session window is sized to the dimensions specified through /w and /h, or through <b>desktopwidth</b> and <b>desktopheight</b>.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>full address </td>
					<td>s</td>
					<td></td>
					<td>
						Specifies the name or IP address (and optional port) of the remote computer that you want to connect to.<br />
						<br />
						Will be ignored by RDP+.
					</td>
					<td>Yes</td>
					<td>/v</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>gatewaycredentialssource</td>
					<td>i</td>
					<td>4</td>
					<td>
						Specifies the credentials that should be used to validate the connection with the RD Gateway.<br />
						<br />
						0 - Ask for password (NTLM).<br />
						1 - Use smart card.<br />
						4 - Allow user to select later.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>gatewayhostname</td>
					<td>s</td>
					<td></td>
					<td>
						Specifies the hostname of the RD Gateway.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>gatewayprofileusagemethod</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines the RD Gateway authentication method to be used.<br />
						<br />
						0 - Use the default profile mode, as specified by the administrator.<br />
						1 - Use explicit settings.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>gatewayusagemethod</td>
					<td>i</td>
					<td>4</td>
					<td>
						Specifies if and how to use a Remote Desktop Gateway (RD Gateway) server.<br />
						<br />
						0 - Do not use an RD Gateway server.<br />
						1 - Always use an RD Gateway, even for local connections.<br />
						2 - Use the RD Gateway if a direct connection cannot be made to the remote computer (i.e. bypass for local addresses).<br />
						3 - Use the default RD Gateway settings.<br />
						4 - Do not use an RD Gateway server.<br />
						<br />
						0 and 4 have the same effect, but setting the method to 4 also sets the option for bypassing local addresses in the Remote Desktop user interface.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>keyboardhook </td>
					<td>i</td>
					<td>2</td>
					<td>
						Determines how Windows key combinations are applied when you are connected to a remote computer.<br />
						<br />
						0 - Windows key combinations are applied on the local computer.<br />
						1 - Windows key combinations are applied on the remote computer.<br />
						2 - Windows key combinations are applied in full-screen mode only.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>negotiate security layer</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether the level of security is negotiated or not.<br />
						<br />
						0 - Security layer negotiation is not enabled and the session is started by using Secure Sockets Layer (SSL).<br />
						1 - Security layer negotiation is enabled and the session is started by using x.224 encryption.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>password 51</td>
					<td>b</td>
					<td></td>
					<td>
						The user password in a binary hash value. Will be overruled by RDP+.
					</td>
					<td>Yes</td>
					<td>/p, /pe, /i</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>pinconnectionbar</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether or not the connection bar should be pinned to the top of the remote session upon connection when in full screen mode.
						<br />
						0 - The connection bar should not be pinned to the top of the remote session.<br />
						1 - The connection bar should be pinned to the top of the remote session.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>prompt for credentials</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether Remote Desktop Connection will prompt for credentials when connecting to a remote computer for which the credentials have been previously saved.<br />
						<br />
						0 - Remote Desktop will use the saved credentials and will not prompt for credentials.<br />
						1 - Remote Desktop will prompt for credentials.<br />
						<br />
						This setting is ignored by RDP+.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>prompt for credentials on client</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether Remote Desktop Connection will prompt for credentials when connecting to a server that does not support server authentication.<br />
						<br />
						0 - Remote Desktop will not prompt for credentials.<br />
						1 - Remote Desktop will prompt for credentials.<br />
						<br />
						This setting is ignored by RDP+.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>promptcredentialonce</td>
					<td>i</td>
					<td>1</td>
					<td>
						When connecting through an RD Gateway, determines whether RDC should use the same credentials for both the RD Gateway and the remote computer.<br />
						<br />
						0 - Remote Desktop will not use the same credentials .<br />
						1 - Remote Desktop will use the same credentials for both the RD gateway and the remote computer.<br />
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>public mode</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether Remote Desktop Connection will be started in public mode.<br />
						<br />
						0 - Remote Desktop will not start in public mode .<br />
						1 - Remote Desktop will start in public mode and will not save any user data (credentials, bitmap cache, MRU) on the local machine.<br />
						<br />
						This setting is incompatible with autologin and some other features and therefore ignored by RDP+.</td>
					<td>Command line</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>redirectclipboard</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether the clipboard on the client computer will be redirected and available in the remote session and vice versa.<br />
						<br />
						0 - Do not redirect the clipboard.<br />
						1 - Redirect the clipboard.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>redirectcomports</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether the COM (serial) ports on the client computer will be redirected and available in the remote session.<br />
						<br />
						0 - The COM ports on the local computer are not available in the remote session.<br />
						1 - The COM ports on the local computer are available in the remote session.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>redirectdirectx</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether DirectX will be enabled for the remote session.<br />
						<br />
						0 - Do not enable DirectX rendering.<br />
						1 - Enable DirectX rendering in the remote session.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>redirectdrives</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether local disk drives on the client computer will be redirected and available in the remote session.<br />
						<br />
						0 - The drives on the local computer are not available in the remote session.<br />
						1 - The drives on the local computer are available in the remote session.<br />
						<br />
						Note: This setting is replaced by <b>drivestoredirect</b> from RDC 6.0 onward.
					</td>
					<td>Yes</td>
					<td>/[no]drives</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
				</tr>
				<tr>
					<td>redirectposdevices</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether Microsoft Point of Service (POS) for .NET devices connected to the client computer will be redirected and available in the remote session.<br />
						<br />
						0 - The POS devices from the local computer are not available in the remote session.<br />
						1 - The POS devices from the local computer are available in the remote session.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>redirectprinters</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether printers configured on the client computer will be redirected and available in the remote session.<br />
						<br />
						0 - The printers on the local computer are not available in the remote session.<br />
						1 - The printers on the local computer are available in the remote session.
					</td>
					<td>Yes</td>
					<td>/[no]printers</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>redirectsmartcards</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether smart card devices on the client computer will be redirected and available in the remote session.<br />
						<br />
						0 - The smart card device on the local computer is not available in the remote session.<br />
						1 - The smart card device on the local computer is available in the remote session.
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationcmdline</td>
					<td>s</td>
					<td></td>
					<td>
						Optional command line parameters for the RemoteApp.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationfile</td>
					<td>s</td>
					<td></td>
					<td>
						Specifies a file to be opened on the remote computer by the RemoteApp.<br />
						<br />
						Note: For local files to be opened, you must also enable drive redirection for (at least) the source drive.
					</td>
					<td>No</td>
					<td>/remotefile</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationexpandcmdline</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether environment variables contained in the RemoteApp command line parameter should be expanded locally or remotely.<br />
						<br />
						0 - Environment variables should be expanded to the values of the local computer.<br />
						1 - Environment variables should be expanded on the remote computer to the values of the remote computer.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationexpandworkingdir</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether environment variables contained in the RemoteApp working directory parameter should be expanded locally or remotely.<br />
						<br />
						0 - Environment variables should be expanded to the values of the local computer.<br />
						1 - Environment variables should be expanded on the remote computer to the values of the remote computer.<br />
						<br />
						Note: The RemoteApp working directory is specified through the <b>shell working directory</b> parameter.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationicon</td>
					<td>s</td>
					<td></td>
					<td>
						Specifies the file name of an icon file to be displayed in the Remote Desktop interface while starting the RemoteApp. By default RDC will show the standard Remote Desktop icon.<br />
						<br />
						Note: Only .ico files are supported.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationmode</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether a RemoteApp shoud be launched when connecting to the remote computer.<br />
						<br />
						0 - Use a normal session and do not start a RemoteApp.<br />
						1 - Connect and launch a RemoteApp.
					</td>
					<td>No</td>
					<td>/remoteapp</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationname</td>
					<td>s</td>
					<td></td>
					<td>
						Specifies the name of the RemoteApp in the Remote Desktop interface while starting the RemoteApp.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>remoteapplicationprogram</td>
					<td>s</td>
					<td></td>
					<td>
						Specifies the alias or executable name of the RemoteApp.
					</td>
					<td>No</td>
					<td>/remoteapp </td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>screen mode id</td>
					<td>i</td>
					<td>2</td>
					<td>
						Determines whether the remote session window appears full screen when you connect to the remote computer.<br />
						<br />
						1 - The remote session will appear in a window.<br />
						2 - The remote session will appear full screen.
					</td>
					<td>Yes</td>
					<td>
						/f[ullscreen], /fit, <br />
						/max, /w, /h
					</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>server port</td>
					<td>i</td>
					<td>3389</td>
					<td>
						Defines an alternate default port for the Remote Desktop connection.<br />
						<br />
						Will be overruled by any port number appended to the server name.
					</td>
					<td>Command line</td>
					<td>/v</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>session bpp </td>
					<td>i</td>
					<td>32</td>
					<td>
						Determines the color depth (in bits) on the remote computer when you connect.<br />
						<br />
						8 - 256 colors (8 bit).<br />
						15 - High color (15 bit).<br />
						16 - High color (16 bit).<br />
						24 - True color (24 bit).<br />
						32 - Highest quality (32 bit).
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>shell working directory </td>
					<td>s</td>
					<td></td>
					<td>
						The working directory on the remote computer to be used if an alternate shell is specified. 
					</td>
					<td>Yes</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>smart sizing</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether the client computer should scale the content on the remote computer to fit the window size of the client computer when the window is resized. <br />
						<br />
						0 - The client window display will not be scaled when resized.<br />
						1 - The client window display will be scaled when resized.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>span monitors</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether the remote session window will be spanned across multiple monitors when you connect to the remote computer.<br />
						<br />
						0 - Monitor spanning is not enabled.<br />
						1 - Monitor spanning is enabled.<br />
						<br />
						Note: When using Remote Desktop Connection 7 (Windows 7/2008), the <b>use multimon</b> setting is recommended.
					</td>
					<td>Yes</td>
					<td>/span</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>superpanaccelerationfactor</td>
					<td>i</td>
					<td>1</td>
					<td>
						Specifies the number of pixels that the screen view scrolls in a given direction for every pixel of mouse movement by the client when in SuperPan mode<br />
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>use multimon</td>
					<td>i</td>
					<td>0</td>
					<td>
						Determines whether the session should use true multiple monitor support when connecting to the remote computer.<br />
						<br />
						0 - Do not enable multiple monitor support.<br />
						1 - Enable multiple monitor support.
					</td>
					<td>Yes</td>
					<td>/multimon</td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>username </td>
					<td>s</td>
					<td></td>
					<td>
						Specifies the name of the user account that will be used to log on to the remote computer.<br />
						<br />
						Will be ignored by RDP+.
					</td>
					<td>Yes</td>
					<td>/u</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>videoplaybackmode</td>
					<td>i</td>
					<td>1</td>
					<td>
						Determines whether RDC will use RDP efficient multimedia streaming for video playback.<br />
						<br />
						0 - Do not use RDP efficient multimedia streaming for video playback.<br />
						1 - Use RDP efficient multimedia streaming for video playback when possible.
					</td>
					<td>No</td>
					<td></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered"></td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				<tr>
					<td>winposstr</td>
					<td>s</td>
					<td>0,3,0,0,800,600</td>
					<td>
						Specifies the position and dimensions of the session window on the client computer.<br />
						<br />
						Will be overruled by RDP+.
					</td>
					<td>No</td>
					<td>/f[ullscreen], /fit, <br />/max, /w, /h, /pos</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
					<td class="centered">X</td>
				</tr>
				</tbody>
			</table>
			<br />
			<br />
		</div>
	</body>
</html>