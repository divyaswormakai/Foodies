<?php
	
require 'connection.php';

if(isset($_POST['submit'])){
	$link = $_POST['link'];
	$file_id = $_POST['file_id'];
	if (!is_dir($link)) {
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($link).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($link));
	    readfile($link);
	    $res = mysqli_query($conn,"UPDATE files SET no_of_downloads = no_of_downloads + 1 where file_id = '$file_id'");
		if($res){
	    	exit;
	    }
	    else{
	    	echo mysqli_error($conn);
	    }
	}
}
?>
