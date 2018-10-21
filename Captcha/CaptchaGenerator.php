<?php
namespace LeaveFormManagement\Captcha;
use LeaveFormManagement\Session\Session;
use LeaveFormManagement\Service\Container;

class CaptchaGenerator{

    private $width = 150;

    private $height = 50;

    private $bgColor = '255,255,255';

    private $textColor = '0,5,5';

    private $font = '/var/www/LeaveFormManagement/Captcha/tahomabd.ttf';

    private $fontSize= 15;

    private $bgImage = NULL;

    private $captchaImage = NULL;

    private $captchaText;

    private $noCaptchaText=6;//number of characters for captcha image

    public function createCaptcha(){

        $random_characters=array_merge(range(0,9),range('A','Z'),range('a','z'));//creating combination of numbers & alphabets

        shuffle($random_characters);//shuffling the characters 

        $this->captchaText="";
        

        for($i=0;$i<$this->noCaptchaText;$i++){
            $this->captchaText .= $random_characters[rand(0,count($random_characters)-1)];
        }
        $bgColor=explode(',',$this->bgColor);

        $this->captchaImage = imagecreatetruecolor($this->width, $this->height);
        $this->bgImage = imagecolorallocate($this->captchaImage,$bgColor[0],$bgColor[1],$bgColor[2]);

        imagefill($this->captchaImage, 10, 10, $this->bgImage);
        $Colors =  array (	'0' => '145',
            '1' => '204',
            '2' => '177',
            '3' => '184',
            '4' => '199',
            '5' => '255');

        for ($x=0; $x < $this->width; $x++){

            for ($y=0; $y < $this->height; $y++){

                $random = mt_rand(0 , 5);
                $temp_color = imagecolorallocate( $this->captchaImage , $Colors["$random"] , $Colors["$random"] , $Colors["$random"] );
                imagesetpixel( $this->captchaImage, $x, $y , $temp_color );
            }
            $charColor = explode(',',$this->textColor);
            $textColor = imagecolorallocatealpha($this->captchaImage, $charColor[0], $charColor[1], $charColor[2], 60);
        }

        $xCoordinate = 10;
        $yCoordinate = 20;
        for( $i=0;$i<$this->noCaptchaText;$i++){

            $char = $this->captchaText[$i];
            $random_x = mt_rand($xCoordinate , $xCoordinate+15);
            $random_y = mt_rand($yCoordinate , $yCoordinate+15);
            $random_angle = mt_rand(-20 , 20);
            #imagestring($this->captchaImage, $this->fontSize, $random_x, $random_y, $char, $textColor);
            imagettftext($this->captchaImage, $this->fontSize, $random_angle, $random_x, $random_y, $textColor, $this->font, $char);
            $xCoordinate+=20;
        }
        
        ob_start();
        imagejpeg($this->captchaImage);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function getCaptchaText() {
        return $this->captchaText;
    }


}
