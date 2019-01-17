<?php


$fileName = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$fileError = $_FILES['file']['error'];
$tmpName = $_FILES['file']['tmp_name'];
$fileContent = file_get_contents($_FILES['file']['tmp_name']);

$ext      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

$token = $_POST["token"];

if($fileError == UPLOAD_ERR_OK){
   $valid = true;
                    //validate file extensions
                    if ( !in_array($ext, array('srt','txt')) ) {
                        $valid = false;
                       echo json_encode(array(
							'error' => true,
							'message' => 'Not a subtitle file!'));
                    }
                    //upload file
                    if ($valid) {
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'subtitles' . DIRECTORY_SEPARATOR. $fileName;
                        move_uploaded_file($tmpName,$targetPath);
						rename($targetPath,'subtitles/' . $token);
                        echo json_encode(array(
							'success' => true,
							'message' => 'Upload success!'));
						}
                        exit;
}else{
   switch($fileError){
     case UPLOAD_ERR_INI_SIZE:   
          $message = 'Error al intentar subir un archivo que excede el tamaño permitido.';
          break;
     case UPLOAD_ERR_FORM_SIZE:  
          $message = 'Error al intentar subir un archivo que excede el tamaño permitido.';
          break;
     case UPLOAD_ERR_PARTIAL:    
          $message = 'Error: no terminó la acción de subir el archivo.';
          break;
     case UPLOAD_ERR_NO_FILE:    
          $message = 'Error: ningún archivo fue subido.';
          break;
     case UPLOAD_ERR_NO_TMP_DIR: 
          $message = 'Error: servidor no configurado para carga de archivos.';
          break;
     case UPLOAD_ERR_CANT_WRITE: 
          $message= 'Error: posible falla al grabar el archivo.';
          break;
     case  UPLOAD_ERR_EXTENSION: 
          $message = 'Error: carga de archivo no completada.';
          break;
     default: $message = 'Error: carga de archivo no completada.';
              break;
    }
      echo json_encode(array(
               'error' => true,
               'message' => $message
            ));
}

?>