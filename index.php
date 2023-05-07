<? 
session_start();
ob_start();
echo $_SESSION['proses_pemilihan'];
if(!$_SESSION['proses_pemilihan']) 
{
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<title>E-Voting PCM | Palang Tuban &rsaquo; Log In</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel='stylesheet' id='login-css'  href='inc/login.css' type='text/css' media='all'/>
		<link rel='stylesheet' id='colors-fresh-css'  href='inc/colors-fresh.css' type='text/css' media='all'/>
		<link rel="icon" type="image/x-icon" href="images_admin/muh.ico" />
		<!-- <script type="text/javascript" src="include/savingmode.js"></script> -->
	</head>
	<div id="login">
		<div id="logo">
			<table border="0" width="100%">
				<tr>
					<td width="70" style="padding-left:10px;"><span id="logo_muh"></span></td>
					<td valign="top" style="padding-top:20px;"><span id="judul">E-Voting PCM | Palang Tuban</span>
					<br /><span id="">Supported By SD Muhammadiyah 2 Palang-Tuban</span>
					</td>
				</tr>
			</table>
		</div>
		<form name="loginform" id="loginform" action="inc/login.php" method="post">
			<p>
				<label>Proses Pemilihan<br />
					<?
						include("inc/dbconnection.php");
						include("inc/commonfunctions.php");
						$conn=db_connect("mysql");
						$db=db_mysql_select("e-voting",$conn);
						$sql="select * from m_dewan WHERE dewan_status='1'";
						$rs1 = db_query($sql,$conn);
						echo "<table width='100%' cellpadding='2' cellspacing='3' align='center' style='border-collapse:collapse;' border='0' bordercolor='#E0E0E0'>";
							echo "<tr align='center' height='25px;'>
								<td width='2%'>&nbsp;</td>
								<td>NAMA PEMILIHAN</td>
							</tr>";
						$no=1;
						while($data = db_fetch_array($rs1))
						{
							$dewan_id	= $data['dewan_id'];
							$dewan_nama	= $data['dewan_nama'];
							echo "<tr height='20px;'>
								<td NoWrap>&nbsp;<input type='radio' name='dewan_id' value='$dewan_id'>&nbsp;</td>
								<td align='left'>$dewan_nama</td>
							</tr>";
							$no++;
						}
						echo "</table>";
					?>
				</label>
			</p><br>
			<p class="forgetmenot"><label>* Pilih Proses Pemilihan</label></p>
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Proses" tabindex="100" />
			</p>
		</form>
		<p id="nav">
			<div style="border-top: 1px solid rgb(204, 204, 204); background: rgb(239, 239, 239) none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;" width="100%" cellpadding="0" cellspacing="0"></div><br>
		   <center>
			   Copyright &copy; 2016<br>Pimpinan Cabang Muhammadiyah Palang Tuban<br />
		   </center>
		</p>
	</div>
	 
	<p id="backtoblog">
		<marquee  behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="3" direction="left" width="100%" height="80" align="center" style="padding-top:8px;">
		E-voting Pimpinan Cabang Muhammadiyah Palang Tuban
		</marquee>
	</p>
<?
}
else
{
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" >
	<head>
		<title>E-Voting PCM | Palang Tuban &rsaquo; Log In</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel='stylesheet' id='login-css'  href='inc/login.css' type='text/css' media='all'/>
		<link rel='stylesheet' id='colors-fresh-css'  href='inc/colors-fresh.css' type='text/css' media='all'/>
		<link rel="icon" type="image/x-icon" href="images_admin/muh.ico" />
	</head>
	<div id="login">
		<div id="logo">
			<table border="0" width="100%">
				<tr>
					<td width="70" style="padding-left:10px;"><a href='include/logout.php'><span id="logo_muh"></span></a></td>
					<td valign="top" style="padding-top:20px;">
						<span id="judul">E-Voting PCM | Palang Tuban</span><br />
						<span id="">Supported By SD Muhammadiyah 2 Palang-Tuban</span>
					<? 
					//echo cari_nilaitabel("dewan_nama","dewan_id='".$_SESSION['proses_pemilihan']."'","m_dewan",$conn);?></span>
					</td>
				</tr>
			</table>
		</div>
		<form name="loginform" id="loginform" action="<? echo "$PHP_SELF"; ?>" method="POST" autocomplete='off'>
			<p>
				<label>Username<br />
				<input type="text" name="log" id="user_login" class="input" value="" size="20" tabindex="10" /></label>
			</p>
			<p>
				<label>Password<br />
				<input type="password" name="pwd" id="user_pass" class="input" value="" size="20" tabindex="20" /></label>
		 
			</p>
			<p class="forgetmenot"><label>* Isikan Username & Password Anda</label></p>
			<p class="submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="Log In" tabindex="100" />
				<input type="hidden" name="redirect_to" value="<?=$postlink ?>#respond" />
				<input type="hidden" name="testcookie" value="1" />
			</p>
		</form>
		<p id="nav">
			<div style="border-top: 1px solid rgb(204, 204, 204); background: rgb(239, 239, 239) none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;" width="100%" cellpadding="0" cellspacing="0"></div><br>
		   <center>
			   Copyright &copy; 2016<br>Pimpinan Cabang Muhammadiyah Palang Tuban<br />
		   </center>
		</p>
	</div>
	 
	<p id="backtoblog">
		<marquee  behavior="scroll" onMouseOver="this.stop()" onMouseOut="this.start()" scrollamount="3" direction="left" width="100%" height="80" align="center" style="padding-top:8px;">
		E-voting Pimpinan Cabang Muhammadiyah Palang Tuban -:- Supported By SD Muhammadiyah 2 Palang Tuban
		
		</marquee>
	</p>
	<script type="text/javascript">
		try{document.getElementById('user_login').focus();}catch(e){}
	</script>
<?
}
	if($_POST){
		include("inc/dbconnection.php");
		include("inc/commonfunctions.php");
		$conn=db_connect("mysql");
		$db=db_mysql_select("e-voting",$conn);

		$un=trim($_POST['log']);
		$pw=md5($_POST['pwd']);
		if($un && $pw) {	
			$sql="select * from m_user WHERE trim(user_id)='".$un."' and user_password = '".$pw."' and dewan_id='".$_SESSION['proses_pemilihan']."'";
//			echo $sql; exit();
			$rs1 = db_query($sql,$conn);
			$data = db_fetch_array($rs1);
			//echo GetRowCount($sql); exit();
			if (GetRowCount($sql)> 0){	
				$iduser_web = trim($data["user_id"]);
				$namauser_web = ucwords(strtolower($data["user_nama"]));
				$groupuser_web = $data["group_id"];
				/*
				group user :
				1 = admin
				2 = Operator
				*/
				// Simpan data kesession
				session_register('iduser_web');
				session_register('namauser_web');
				session_register('groupuser_web');
				echo "
				<script>
					location.href='main.php';
				</script>";	
			}
			else {
				echo "
				<script>
					alert('Maaf, Username atau Password Anda Salah...!');
					location.href='index.php';
				</script>";	
			}
		}
		else {
			echo "
			<script>
				alert('Maaf, Username atau Password Harus Diisi...!');
				location.href='index.php';
			</script>";	
		}
			
	}
?>

</body>
</html>
