<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$errors="";
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        if(mime_content_type($_FILES["fileToUpload"]["tmp_name"])=="application/pdf"){
        	$uploadOk=1;
        }else{
        	$uploadOk = 0;
        	$errors.=":Datoteka ni slika ali pdf.";
        }
    }
}
// Check if file already exists
$c=1;
$ext = pathinfo($target_file, PATHINFO_EXTENSION);
$filename = basename($target_file, ".$ext");
if(file_exists($target_file)){
	while(file_exists("$target_dir$filename($c).$ext")){
		    $c=$c+1;
	}
	$target_file="$target_dir$filename($c).$ext";
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    $errors.=":Datoteka je prevelika.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType!="pdf") {
    $errors.=":Dovoljene so samo jpg, png, gif, jpeg in pdf datoteke.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    $errors.=":Napaka! Datoteka ni bila naložena.";
// if everything is ok, try to upload file
} else {
 	$file=$_FILES["fileToUpload"]["tmp_name"];
    if (move_uploaded_file($file, $target_file)) {
        $errors.=":Datoteka ". basename( $_FILES["fileToUpload"]["name"]). " je bila naložena.";
    } else {
        $errors.=":Napaka pri nalaganju datoteke.";
    }
}
?>
<!DOCTYPE html>
<html>
	<head>
	<?php if($uploadOk==1){echo'<script>location.href="/";</script>';}?>
		<meta name="keywords" content="Datoteke, Za, Prenos, Jakob, Hostnik, net, 23, free, zastonj">
		<meta name="description" content="Prenašanje javnih datotek na server brezplačno.">
		<meta name="author" content="Jakob Hostnik">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Naloži datoteke</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="styles/site.css" rel="stylesheet">
		<script src="scripts/jquery-1.12.0.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
 	</head>
	<body>
		<nav class="navbar navbar-inverse">
		 <div class="container">
		   <div class="navbar-header">
		      <a class="navbar-brand" href="/">Nalaganje datotek</a>
		   </div>
		 </div>
	    </nav>
		<div class="container">
			<!-- show-->
			<div class="panel panel-danger">
				<div class="panel-heading">Napake</div>
				<ul class="list-group">
					<?php
						$napake=explode(":",$errors);
						foreach($napake as $napaka){
							if($napaka=="")continue;
							printf('<li class="list-group-item">%1$s</li>',$napaka);
						}
					?>
				</ul>
				<div class="panel-footer"><a href="/">Vrni se nazaj</a></div>
			</div>
			<!--end-->
		</div>
	</body>
</html>


