<?php

 class UploadException extends Exception{
   
        public function __construct($code){
                          
                $message=$this->codeMessage($code);
                parent::__construct($message,$code);
          }

        private function  codeMessage($code)
        {
             $errors=array(
                               0=>'Well Done, no errors!  Your File Upload was successful',
                               1=>'The uploaded file exceeds upload_max_filesize directive in php.ini',
                               2=>'Uploaded file exceeds maximum size as defined in HTML form',
                               3=>'The file was only partially uploaded',
                               5=>'No file was uploaded or the file is of the wrong type. Please double check your upload',
                               6=>'No temporary folder available.Its missing',
                               7=>'Couldnot write the file to disk',
                               8=>'A PHP extension stopped the file from uploading',
                             );
               
             return array_key_exists($code, $errors) ? $errors[$code] : 'An unknown error occurred. That is an uknown error code';
            
       }

 }

