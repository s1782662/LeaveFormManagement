<?php

namespace LeaveFormManagement\Router;

use LeaveFormManagement\Aura\Router\Map;
use LeaveFormManagement\Aura\Router\DefinitionFactory;
use LeaveFormManagement\Aura\Router\RouteFactory;


class RouteRepository {

  protected $routes ;

  protected $map;

  public function __construct(){
    $this->map = new Map(new DefinitionFactory, new RouteFactory);

    $this->map->add('login','Login',[
      'values' => [
        'controller' => 'Login',
        'action' => 'Index'
      ],
    ]);
    $this->map->add('logout','Logout',[
      'values' => [
        'controller' => 'Logout',
        'action' => 'Index'
      ],
  ]);
    $this->map->add('error','lgerr',[
        'values'=>[
            'controller'=>'Login',
            'action'=>'generateViewLoginError',
        ],
    ]);


    $this->map->add('student', 'student', array(
    	'values' => [
    		'controller' => 'Profile',
    		'action' => 'profile'
    	]
    ));

    $this->map->add('login','login',[
      'values' => [
          'controller'=>'Login',
          'action'=>'generateViewLogin',
      ],
		]);

    $this->map->add('student.warden','student.warden',array(
      'values' => [
        'controller' => 'Profile',
        'action' => 'wardenProfile',
      ]
  ));

    $this->map->add('proctor.list','proctor.list',array(
        'values' => [
            'controller' => 'Profile',
            'action' => 'getRespectiveProctorStudent',
        ],
    ));

    $this->map->add('student.proctor','student.proctor',array(
      'values' => [
        'controller' => 'Profile',
        'action' => 'proctorProfile',
      ]
		));

	$this->map->add('event','event',array(
			'values'=>[
				'controller'=>'Event',
				'action'=>'Index',
			]
		));

    $this->map->add('leave','Leave',array(
      'values' => [
        'controller' => 'LeaveForm',
        'action' => 'leaveController',
      ]
    ));

    $this->map->add('home','home',array(
      'values' => [
        'controller' => 'Profile',
        'action' => 'leaveFormViewProfile',
      ]
    ));

    $this->map->add('status','status',array(
      'values' => [
        'controller' => 'LeaveForm',
        'action' => 'leaveStatusController',
      ]
    ));

    $this->map->add('delete','delete',array(
      'values' => [
        'controller' => 'LeaveForm',
        'action' => 'deleteLeaveForm',
      ]
    ));

    $this->map->add('update','update',array(
      'values' => [
        'controller' => 'Profile',
        'action' => 'profilePasswordUpdate',
      ]
    ));

    $this->map->add('leavestatus','leavestatus',array(
      'values'=>[
        'controller'=>'Profile',
        'action'=>'getStatusView',
      ]
    ));
    
    $this->map->add('cancel','cancelleave',array(
      'values'=>[
        'controller' => 'LeaveForm',
        'action'=>'deleteLeaveForm',
      ]
    ));


     $this->map->add('warden','warden',array(
      'values'=>[
        'controller' => 'Profile',
    		'action' => 'warden',
      ]
    ));
    
    $this->map->add('proctor','proctor',array(
      'values'=>[
        'controller' => 'Profile',
    		'action' => 'proctor',
      ]
    ));

    $this->map->add('unapprove.forms','unapprove.forms',array(
      'values' => [
        'controller' => 'LeaveForm',
         'action' => 'getUnapprovedLeaveForms',
      ]
    )); 
		
		$this->map->add('approve.forms','approve.forms',array(
      'values' => [
        'controller' => 'LeaveForm',
         'action' => 'getApprovedLeaveForms',
      ]
    ));

    $this->map->add('proctorapprove.forms','proctor.apforms',array(
      'values' => [
        'controller' => 'LeaveForm',
        'action'=> 'getProctorApprovedLeaveForms',
      ]
    ));

    $this->map->add('proctorunapprove.forms','proctor.unforms',array(
      'values'=>[
        'controller' => 'LeaveForm',
        'action'=>'getProctorUnApprovedLeaveForms',
      ]
    ));    
    
     $this->map->add('approval','approval',array(
      'values' => [
        'controller' => 'LeaveForm',
        'action' => 'setApproveToLeaveForm'
      ]
    ));
    
    $this->map->add('disapproval','disapproval',array(
      'values' => [
        'controller' => 'LeaveForm',
        'action' => 'setUnApproveToLeaveForm'
      ]
    ));

    $this->map->add('captcha','captcha',array(
      'values' => [
        'controller' => 'Captcha',
        'action'=>'create',
      ]
  ));

    $this->map->add('compare','cap_comp',array(
        'values'=> [
            'controller' => 'Captcha',
            'action'=>'processCaptcha',
        ]
    ));

    $this->map->add('proctorApproval','proc.app',array(
        'values' => [
            'controller' => 'LeaveForm',
            'action' => 'setProctorApproveToLeaveForm'
        ]
    ));

    $this->map->add('proctor disapproval','proc.disapp',array(
        'values'=>[
            'controller'=>'LeaveForm',
            'action'=>'setProctorUnApproveToLeaveForm'
        ]
    ));

    $this->map->add('securityView','securityview',array(
        'values'=>[
            'controller'=>'Security',
            'action'=>'searchView',
        ]
    ));   

    $this->map->add('searchsecurity','securitysearch',array(
        'values'=>[
            'controller'=>'Security',
            'action'=>'search',
        ]
    ));



  }

  public function getMap(){
    return $this->map;
  }

}
