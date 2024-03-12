<?php

// Include '../Model/Models.php';
$c = new Controllers();
$c->getConnection();

if(isset($_POST['ProjectTitle']) && isset($_POST['ProjectDescription']) && isset($_POST['ProjectStatus']) && isset($_POST['ProjectDuration']) && isset($_POST['ProjectTech'])){
    $ProjectTitle = $_POST['ProjectTitle'];
    $ProjectDescription = $_POST['ProjectDescription'];
    $ProjectStatus = $_POST['ProjectStatus'];
    $ProjectDuration = $_POST['ProjectDuration'];
    $ProjectTech = $_POST['ProjectTech'];

    // Check if file was uploaded successfully
    if(isset($_FILES['ProjectImage']) && $_FILES['ProjectImage']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['ProjectImage']['tmp_name'];
        $fileName = $_FILES['ProjectImage']['name'];
        $fileSize = $_FILES['ProjectImage']['size'];
        $fileType = $_FILES['ProjectImage']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Define the allowed file extensions
        $allowedExtensions = array('jpg', 'jpeg', 'png');

        // Check if the uploaded file has a valid extension
        if(in_array($fileExtension, $allowedExtensions)) {
            // Generate a unique name for the file to avoid conflicts
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

            // Move the uploaded file to the desired location
            $uploadFileDir = '/path/to/upload/directory/';
            $dest_path = $uploadFileDir . $newFileName;
            if(move_uploaded_file($fileTmpPath, $dest_path)) {
                // File was uploaded successfully, proceed with adding the project
                $result = $c->addProject($ProjectTitle, $ProjectDescription, $newFileName, $ProjectStatus, $ProjectDuration, $ProjectTech);
                if($result){
                    echo "<script>alert('Project added successfully')</script>";
                }
                else{
                    echo "<script>alert('Project not added')</script>";
                }
            } else {
                echo "<script>alert('Failed to move uploaded file')</script>";
            }
        } else {
            echo "<script>alert('Invalid file extension. Only JPG, JPEG, and PNG files are allowed.')</script>";
        }
    } else {
        echo "<script>alert('Failed to upload file')</script>";
    }
}
?>