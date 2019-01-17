<?php
        //turn on php error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             
            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));
			
			$token = md5(uniqid(rand(), true));
			
           
            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    //validate file extensions
                    if ( !in_array($ext, array('jpg','m4v','avi','mkv','mp4','webm','flv','ogg','wmv')) ) {
                        $valid = false;
                        header( 'error_page.php?err=extension' ) ;
                    }
                    //validate file size
                    if ( $size/1024/1024 > 2048 ) {
                        $valid = false;
                        header( 'error_page.php?err=sizefile' ) ;
                    }
                    //upload file
                    if ($valid) {
                        $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR. $name;
                        move_uploaded_file($tmpName,$targetPath);
						rename($targetPath,'uploads/' . $token);
                        header( 'Location: setup.php?token=' . $token . '&name=' . $name ) ;
                        exit;
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    header( 'error_page.php?err=sizefile' ) ;
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    header( 'error_page.php?err=sizefile' ) ;
                    break;
                case UPLOAD_ERR_PARTIAL:
                    header( 'error_page.php?err=partial' ) ;
                    break;
                case UPLOAD_ERR_NO_FILE:
                    header( 'error_page.php?err=nofile' ) ;
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    header( 'error_page.php?err=server' ) ;
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    header( 'error_page.php?err=server' ) ;
                    break;
                case UPLOAD_ERR_EXTENSION:
                    header( 'error_page.php?err=server' ) ;
                    break;
                default:
                    header( 'error_page.php?err=server' ) ;
                break;
            }
 
        }
        ?>