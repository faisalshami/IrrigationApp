<?php
function chechvalues($con,$strang)
{  
	if ($strang!="")
	 {
		$strang=trim($strang);
		$strang=stripcslashes($strang);
		$strang=htmlspecialchars($strang);
		return mysqli_real_escape_string($con,$strang);
	 }
}

?>