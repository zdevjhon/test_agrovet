<?php

namespace App;

date_default_timezone_set('America/Lima'); 

class Api
{

    /**
     * upload files
     */
    public static function uploadFile($post_name = '', $path = '', array  $validFileExtension){
    
        $fileName = $_FILES[$post_name]['name'];
        if(empty($fileName)){
            $newFileName = null;
        }else{
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
            if(!in_array($ext, $validFileExtension)){
                $message = 'Sube un archivo válido. Solo se permiten archivos '.implode(', ', $validFileExtension);
                echo json_encode(['msg' => $message, 'status' => STATUS_FAIL]);
                exit();
            }

            $fileSize = $_FILES[$post_name]['size'];
    
            if($fileSize > 10000000){
                $message = 'El tamaño de archivo máximo permitido es de 10 MB.';
                echo json_encode(['msg' => $message, 'status' => STATUS_FAIL]);
                exit();
            }
    
            if(!is_dir(FILE_UPLOAD_PATH.$path)){
                mkdir(FILE_UPLOAD_PATH.$path, 0777, true);
            }
    
            $fileName = $_FILES[$post_name]['name'];
            $fileTmpName = $_FILES[$post_name]['tmp_name'];
            $newFileName = rand().time().'.'.strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $uploadPath = FILE_UPLOAD_PATH.$path.basename($newFileName);

           // $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if(move_uploaded_file($fileTmpName,$uploadPath) && is_writable(FILE_UPLOAD_PATH)){
                return $newFileName;
            }
            else{
                return $newFileName = null;
            }

        }

        return $newFileName;
    }

}