

<?php
$target_dir = "/var/www/html/project/uploads/";
$target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


echo $new_filename;

// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    echo $check;
    echo "hello";
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
/*if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
*/
// Allow certain file formats
if($imageFileType != "pdf") {
   echo "Sorry, only PDF is allowed.";
   $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Uploading ". basename( $_FILES["fileToUpload"]["name"]). " file";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

/*$page = "index1.php";
$sec = "1";
header("Refresh: $sec; url=$page");*/
?>
