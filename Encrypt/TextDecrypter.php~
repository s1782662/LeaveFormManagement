<?php
include_once './EncrypterInterface.php';
 class TextDecrypter implements EncrypterInterface{

    public function TextDecrypt($encrypted){
      $data = base64_decode($encrypted);  
      $iv = substr($data, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC));
      $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,hash('sha256', $key, true),substr($data, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC)),MCRYPT_MODE_CBC,$iv),"\0");
     return $decrypted;
    }
    
} 
