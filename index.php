<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>

 <style>
     .hidden { display:none;}
     label {
 font-size: 14px;
 font-weight: 600;
 color: #fff;
 background-color: #106BA0;
 display: inline-block;
 transition: all .5s;
 cursor: pointer;
 padding: 15px 40px !important;
 text-transform: uppercase;
 width: fit-content;
 text-align: center;
 
     } 
  </style>
     <meta name="viewport" content="width = device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="materialize/1.0.0/css/materialize.css">
    <script type="text/javascript" src="jquery/2.1.1/jquery.js"></script>
    <script src="materialize/1.0.0/js/materialize.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <title>PHP File Upload</title>
</head>
<body>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>
 <div class="section"></div>
 <div class="section"></div> 
 <div class="section"></div> 
 <div class="section"></div>
 <div class="section"></div>
 <div class="section"></div> 
 <div class="section"></div> 
 <div class="section"></div> 
 <div class="section"></div>
 <div class="section"></div> 




 <form method="POST" id='form_1' onsubmit='return false;' action="upload.php" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="input-field col s12"> 
          <i class="material-icons prefix">face</i>
          <form name="form" action="" method="post">
          <input class="center hoverable" type="text" name="student_name" id="student_name" value="" placeholder="Student name" required>
          </form>
        </div>
      </div>
        <div class="center">
      <label class='waves-effect waves-light btn-large white-text green darken-3 filesel hoverable'><i class='material-icons left'>file_upload</i> Seleccione Archivo
       <input type="file" name="uploadedFile" multiple="" class="hidden" id="uploadedFile">
    </label>
        </div>
    </div>
    

  <script> 
    (function(w, d) {
        const MAX_FILE_SIZE = 10240000 ; /* Cambiarlo por el maximo tamaño que quieras en bytes */
        document.addEventListener("DOMContentLoaded", function(event) {
            const inputFile = d.getElementById('uploadedFile');
            const frm  =  d.getElementById('form_1');
            inputFile.addEventListener('change', function(e) {

                if (inputFile.files.length > 0) {
                    const selectedFile = inputFile.files[0];
                    if (selectedFile.size < MAX_FILE_SIZE) {
                        frm.submit();
                    } else {
                        alert('no tan grande porfavor ( ͡° ͜ʖ ͡°)');
                    }
                }
            });
        });

    })(window, document);
  </script>
</body>
</html>





