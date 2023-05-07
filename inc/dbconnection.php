<?php
//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//
//							made of m@sdin	at 20 May 2009					//
//									Biro DPSI							//
//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//

$host_mysql="localhost";
$user_mysql="root";
$pwd_mysql="";

function db_connect($tipedb)
{
    $GLOBALS['global_tipedb']="";
	if($tipedb=="mysql"){
		global $host_mysql,$user_mysql,$pwd_mysql,$dbname_mysql;
		$conn = @mysql_connect ($host_mysql,$user_mysql,$pwd_mysql) or die ("koneksi gagal");
	}
	else {
		global $user_oci,$pwd_oci,$sid_oci;
		$conn=ociplogon($user_oci,$pwd_oci,$sid_oci);
		if(!$conn)
			trigger_error(db_error(),E_USER_ERROR);
		$stmt=ociparse($conn,"alter session set nls_date_format='YYYY-MM-DD HH24:MI:SS'");
		ociexecute($stmt);
		ocifreestatement($stmt);
	}
	$GLOBALS['connect']=$conn;
	$GLOBALS['global_tipedb']=$tipedb;
	return $conn;
}
function db_mysql_select($nama_db,$conn)
{
	$conn=$GLOBALS['connect'];
	@mysql_select_db ($nama_db, $conn);
}

function db_query($qstring,$conn)
{
	$conn=$GLOBALS['connect'];
	$tipe_db=$GLOBALS['global_tipedb'];
	$rowcount=0;
	if($tipe_db=="mysql"){
		$query=@mysql_query($qstring,$conn)or die("Query error");
		return $query;
	}
	else {
		$stmt=ociparse($conn,$qstring);
		$stmt_type=ocistatementtype($stmt);
		if(!ociexecute($stmt))
			trigger_error(db_error(), E_USER_ERROR);
		return array($stmt,$rowcount);
	}
}

function db_exec($qstring,$conn)
{
	$conn=$GLOBALS['connect'];
	$tipe_db=$GLOBALS['global_tipedb'];
	if($tipe_db=="mysql"){
		//----------//
	}
	else {
		$stmt=ociparse($conn,$qstring);
		$stmt_type=ocistatementtype($stmt);
		if(!ociexecute($stmt))
			trigger_error(db_error(), E_USER_ERROR);
	}
}

function db_fetch_array($qhandle)
{
	$conn=$GLOBALS['connect'];
	$tipe_db=$GLOBALS['global_tipedb'];
	if($tipe_db=="mysql"){
		$data=@mysql_fetch_array($qhandle);	
		return $data;
	}
	else {
		return myoci_fetch_array($qhandle[0],OCI_ASSOC+OCI_RETURN_NULLS+OCI_RETURN_LOBS);
	}
}

function myoci_fetch_array($qhandle,$flags)
{
	if(function_exists("oci_fetch_array"))
		return oci_fetch_array($qhandle,$flags);
	$data=array();
	if(ocifetchinto($qhandle,$data,$flags))
		return $data;
	return false;
}

function db_close($conn)
{
	$tipe_db=$GLOBALS['global_tipedb'];
	if($tipe_db=="mysql"){
		return @mysql_close($conn);
	}
	else{
		return @ocilogoff($conn);
	}
	$GLOBALS['connect']="";
	$GLOBALS['global_tipedb']="";
}
//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//
//							Email me at : masdi2n@yahoo.com					//
//									Biro P2SISKOM							//
//--------------------------------------------------------------------------//
//--------------------------------------------------------------------------//
?>
