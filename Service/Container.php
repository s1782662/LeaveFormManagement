<?php

namespace LeaveFormManagement\Service;

use LeaveFormManagement\Aura\Di\Container as AuraContainer;
use LeaveFormManagement\Aura\Di\Forge;
use LeaveFormManagement\Aura\Di\Config;

class Container implements ServiceInterface{

  protected $di;

  public function __construct(){
    $this->di = new AuraContainer(new Forge(new Config));
    $this->renderServices();
  }

  public function renderServices(){

    $instance = new \LeaveFormManagement\Persistence\DatabaseAdapter;

    $this->di->params['LeaveFormManagement\Session\Session'] = ['handler' => $this->di->lazyGet('handler')];

    $this->di->params['LeaveFormManagement\Mapper\AbstractDataMapper'] = ['adapter'=> $instance::getInstance() ,'collection' => $this->di->lazyGet('collection'),'map'=> $this->di->lazyGet('EntityMap') ];

    $this->di->params['LeaveFormManagement\Service\LoginForm'] = ['form' => $this->di->lazyGet('Form')];

    $this->di->set('Builder',$this->di->lazyNew('LeaveFormManagement\Form\Input\Builder'));

    $this->di->set('Filter',$this->di->lazyNew('LeaveFormManagement\Form\Input\Filter'));

    $this->di->params['LeaveFormManagement\Form\Input\Form'] = ['builder' => $this->di->get('Builder'),'filter' => $this->di->get('Filter')];

    $this->di->set('collection',$this->di->lazyNew('LeaveFormManagement\Collection\EntityCollection'));

    $this->di->set('EntityMap',$this->di->lazyNew('LeaveFormManagement\Collection\EntityMap'));

    $this->di->set('EntityMapper',$this->di->lazyNew('LeaveFormManagement\Mapper\EntityMapper'));

    $this->di->set('HostelMapper',$this->di->lazyNew('LeaveFormManagement\Mapper\HostelMapper'));

    $this->di->set('Form',$this->di->lazyNew('LeaveFormManagement\Form\Input\Form'));

    $this->di->set('RouteRepository',$this->di->lazyNew('LeaveFormManagement\Router\RouteRepository'));

    $this->di->params['LeaveFormManagement\Router\Router'] = ['rp' => $this->di->get('RouteRepository')];

    $this->di->set('Router',$this->di->lazyNew('LeaveFormManagement\Router\Router'));

    $this->di->set('View',$this->di->lazyNew('LeaveFormManagement\View\View'));

    $this->di->set('handler',$this->di->lazyNew('LeaveFormManagement\Session\EncryptedSessionHandler'));

    $this->di->set('Session',$this->di->lazyNew('LeaveFormManagement\Session\Session'));

    $this->di->set('LoginForm',$this->di->lazyNew('LeaveFormManagement\Service\LoginForm'));

    $this->di->set('LeaveInputForm',$this->di->lazyNew('LeaveFormManagement\Service\LeaveInputForm'));

    $this->di->set('ConfigMapper',$this->di->lazyNew('LeaveFormManagement\Mapper\ConfigMapper'));

    $this->di->set('Config',$this->di->lazyNew('LeaveFormManagement\Model\Config'));

    $this->di->set('LeaveForm',$this->di->lazyNew('LeaveFormManagement\Model\LeaveForm'));

    $this->di->set('LeaveMapper',$this->di->lazyNew('LeaveFormManagement\Mapper\LeaveFormMapper'));

    $this->di->set('Calendar',$this->di->lazyNew('LeaveFormManagement\Calendar\Calendar'));

    $this->di->set('profileform',$this->di->lazyNew('LeaveFormManagement\Service\ProfileForm'));
    
    $this->di->set('ApproveForm',$this->di->lazyNew('LeaveFormManagement\Service\ApproveForm'));
    
    $this->di->set('composite',$this->di->lazyNew('LeaveFormManagement\View\CompositeView'));

    $this->di->set('captcha',$this->di->lazyNew('LeaveFormManagement\Captcha\CaptchaGenerator'));

    $this->di->set('captchaForm',$this->di->lazyNew('LeaveFormManagement\Service\CaptchaForm'));

    $this->di->set('eventForm',$this->di->lazyNew('LeaveFormManagement\Service\EventForm'));

    $this->di->set('eventMapper',$this->di->lazyNew('LeaveFormManagement\Mapper\EventMapper'));

    $this->di->params['LeaveFormManagement\Event\EventManager']= ['em'=>$this->di->get('eventMapper')];
    
    $this->di->set('eventManager',$this->di->lazyNew('LeaveFormManagement\Event\EventManager'));

    $this->di->set('event',$this->di->lazyNew('LeaveFormManagement\Model\Event'));
    
    $this->di->set('hostel',$this->di->lazyNew('LeaveFormManagement\Mapper\HostelMapper'));

    $this->di->set('messageManager',$this->di->lazyNew('LeaveFormManagement\Message\MessageManager'));

    $this->di->set('messageForm',$this->di->lazyNew('LeaveFormManagement\Service\MessageForm'));

    $this->di->set('message',$this->di->lazyNew('LeaveFormManagement\Model\Message'));

    $this->di->set('securityForm',$this->di->lazyNew('LeaveFormManagement\Service\SecurityForm'));

    $this->di->set('err',$this->di->lazyNew('LeaveFormManagement\Form\Input\FormError'));

    return $this;
  }


  public function get(){
    return $this->di;
  } 
}
