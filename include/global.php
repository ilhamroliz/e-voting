<?
function generatePassword($length = 8)
{
	$password = "";
	$possible = "0123456789abcdfghjkmnpqrstvwxyz";
	$i = 0;
	while ($i < $length) 
	{
		$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
		if (!strstr($password, $char)) 
		{
			$password .= $char;
			$i++;
		}
	}
	return $password;
}
?>