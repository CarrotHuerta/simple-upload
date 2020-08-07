<?php
session_start();

$message = ''; 

{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $studentname = $_POST['student_name'];
    $ip = $_SERVER['REMOTE_ADDR'];


    if(!isset($studentname) || trim($studentname) == '')
    {
        $studentname = ('NO_NAME!');
    }

    // sanitize file-name
    $newFileName =  $studentname . "_client ip =(" . $ip . ")" . $fileName . md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'docx', 'png', 'zip', 'txt', 'doc','pdf','rar','ppt','pptx');
    
    

    if (fileSize < $MAX_FILE_SIZE) {
        $_SESSION['message'] = 'el archivo es muy grande vato!';
 }

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        if (trim($studentname) == 'NO_NAME!') {
          $message = ('No name detected, file stored as: "'. $studentname. '_' . $fileName . '"');
        }
        else {
          $message ='File is successfully uploaded.';
        }
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
    

$_SESSION['message'] = $message;
header("Location: index.php");
