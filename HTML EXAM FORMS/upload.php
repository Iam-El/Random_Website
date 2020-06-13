<?php
if(isset($_POST['submit'])) {
    $file = $_FILES['file1'];
   // print_r($file);
    $filename = $_FILES['file']['name'];
    $fileTempName = $_FILES['file']['temp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];


    $fileExt=explode('.',$filename);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array('jpg','jpeg','png','pdf');

    if(in_array($fileActualExt,$allowed)){
        if($fileError===0){
            if($fileSize<1000000){
   $filenamenew=uniqueid('',true).".".$fileActualExt;
   $filenamedestination='uploads/'.$filenamenew;
   move_uploaded_file($fileTempName,$filenamedestination);
   header("Location:index.php?uploadsuccess");
            }else{
                echo "file too big";
            }
        }
        else{
            echo"error uploading";
        }

    }else{
        echo "wrong file";
    }

}

?>