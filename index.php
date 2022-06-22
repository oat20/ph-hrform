<?php
include('admin/compcode/include/config.php');

$array_ip = explode('.',$remoteip);

if($remoteip == "127.0.0.1" or $_SERVER['HTTP_HOST']=='localhost' or $remoteip == "172.16.16.1"){
	//header('location: formindex.php');
	header('location: phpm/login02.php');
}else if($array_ip[0] == "10") //intranet
{ 
	//header('location: formindex.php');
	header('location: phpm/login02.php'); 
} 
else if($array_ip[0] == "202" && $array_ip[1] == "28" && $array_ip[2] >= "128" && $array_ip[2] <= "191") //intranet
{ 
	//header('location: formindex.php');
	header('location: phpm/login02.php');
}else if($remoteip == "172.16.16.1"){
	header('location: phpm/login02.php');
} 
else //internet
{ 
	header('location: inc/check_intranet.php'); 
}
?>