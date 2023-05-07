<?php 
	include('config.php');
	// Clear temp directory
	if ($handle = opendir('photos/temp')) {
		while (false !== ($file = readdir($handle))) {
			@unlink('photos/temp/' . $file);
		}
		closedir($handle);
	}
?>
<script language="javascript" type="text/javascript" src="js/pm.js"></script>
<div class="page">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="left" valign="top" id="contentMid">
            <form action="photo-manager-save.php" method="post">
				<table width='90%' align='center'>
					<tr>
						<td colspan='3' align='left'><b>TAMBAH DATA PERIODE</b></td>
					</tr>
					<tr>
						<td width='20%'>Nama Calon</td>
						<td width='5%' align='center'>:</td>
						<td><input type='text' id='calon_nama' name='calon_nama'  maxlength='10'></td>
					</tr>
					<tr>
						<td width='20%'>Inisial Calon</td>
						<td width='5%' align='center'>:</td>
						<td><input type='text' id='calon_inisial' name='calon_inisial'  maxlength='10'></td>
					</tr>
					<tr>
						<td>Alamat Calon</td>
						<td align='center'>:</td>
						<td><textarea id='calon_alamat' name='calon_alamat' cols='50' rows='2'></textarea></td>
					</tr>
					<tr>
						<td NoWrap valign="top">Foto calon</td>
						<td align='center' valign="top">:</td>
                        <td align="left" valign="top">
                            <div id="error" style="display:none"></div>	
                            <div id="iframe_container">
                                <iframe src="pm-upload.php" frameborder="1"></iframe>
                            </div>

                            <div id="main">
                                <div id="images_container"></div>
                            </div>
						</td>
					</tr>
					<tr>
						<td colspan='3' align='center'>
							<input type="submit" name="submit" value="Simpan">
						</td>
					</tr>
				</table>
            </form>
        </td>
    </tr>
</table>
</div>
</body>
</html>