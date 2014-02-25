<?php 
/*
 * Currently i have considered the name and path of the file as static
 * 
 * */


error_reporting(E_ALL);
ini_set("display_errors",1);

$blnUpload = "false";
$dir		=	__DIR__.'/files/';
$filename = 'test';

//if file already exists dont ask for upload
if(file_exists($dir.$filename)){
	$blnUpload = "true";
	echo "<pre>". file_get_contents($dir.$filename) ."</pre>";
} else {
	$blnUpload = "false";
}

//if uploads the file for the first time
if(!empty($_FILES) && mime_content_type($_FILES['txtUpload']['name']) ===  'text/plain'){
	
	if(move_uploaded_file($_FILES['txtUpload']['tmp_name'],$dir.$_FILES['txtUpload']['name'])){
		$blnUpload = "true";
		echo "<pre>". file_get_contents($dir.$_FILES['txtUpload']['name']) ."</pre>";
	} else {
			echo "Oops! some error while uploading file. Please try again";
			$blnUpload = "false";	
	}
}

?>

<html>
<head>
	<title>Upload File test</title>	
</head>
	<body>
		<?php if($blnUpload == "false"){ ?>
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="file" name="txtUpload" id="txtUpload"/>
				<input type="submit" name="btnSubmit" id="btnSubmit" value="Upload File"/>
			</form>	
		<?php } else{ ?>
				<noscript><meta http-equiv="refresh" content="1000" /></noscript>
				<script>window.setTimeout(function(){window.location.href=window.location.href},1000);</script>
		<?php } ?>
	</body>
</html>


