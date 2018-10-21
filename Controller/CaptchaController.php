<?php

namespace LeaveFormManagement\Controller;

use LeaveFormManagement\Controller\AbstractController;
use LeaveFormManagement\Session\Session;


class CaptchaController extends AbstractController{

  public function create() {
    $loadcaptcha = $this->getContainer()->get()->get('captcha');
    
    $session = $this->getContainer()->get()->get('Session');
       
    header("Content-Type: image/jpeg; charset=utf-8");
    //header("Content-Length: " . strlen($content));
    echo $loadcaptcha->createCaptcha();       
    $session->add('captcha',$loadcaptcha->getCaptchaText());   
    exit();
  }

  public function processCaptcha(){

    $form = $this->getContainer()->get()->get('captchaForm');

    $loadcaptcha = $this->getContainer()->get()->get('captcha');

    $session = $this->getContainer()->get()->get('Session');

    $session->add('login_u',$_POST['username']);

    $session->add('login_p',$_POST['password']);
       
    $form->init()->fill($_POST);

    $captcha = $form->getInput('captcha')->getValue();

    if($captcha == $session->get('captcha')){
        header('Location:/LeaveFormManagement/Login');
    }else{
        header('Location:/LeaveFormManagement/login');
    }
  }

}
