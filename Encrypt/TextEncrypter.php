<?php
include_once './EncrypterInterface.php';
class TextEncrypter implements EncrypterInterface{   
   public function TextEncrypt($string) { 
    $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC),MCRYPT_DEV_URANDOM);

    $encrypted = base64_encode(
    $iv .mcrypt_encrypt(
         MCRYPT_RIJNDAEL_256,
         hash('sha256', $key, true),
         $string,
         MCRYPT_MODE_CBC,
         $iv)
                          );
    return $encrypted; 
    }
    
}
/*$obj=new TextEncrypterDecrypter();
$enc=$obj->TextEncrypt('sherlock holmes');
echo "text encrypted is ".$enc;

$dec=$obj->TextDecrypt($enc);
echo "<br>"."text decypted is  ".$dec;
*/

?>
