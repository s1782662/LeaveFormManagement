<?php

namespace LeaveFormManagement\Model;

use LeaveFormManagement\Model\AbstractEntity;
use LeaveFormManagement\Model\UserInterface;
use \InvalidArgumentException;

class Entity extends AbstractEntity implements UserInterface
{
    protected $allowedFields = array('name','id','password','mobile','email','birthday','address','area','city','pincode','state','gender','country');
    
    protected $field = array();

    public function setId($id){
      $this->field['id'] = $id;
      return $this;
    }

    public function getId(){
      return $this->field['id'];
    }

    public function setName($name){
      $this->field['name'] = $name;
      return $this;
    }

    public function getName(){
      return $this->field['name'];

    }

    public function setPassword($password){
      if(strlen($password) < 5){
        throw new InvalidArgumentException("The password is too short");
      }
      $this->field['password'] = $password;
      return $this;
    } 

    public function getPassword(){
      return $this->field['password'];
    }

    public function setMobile($mbnumber){
      $this->field['mobile'] = $mbnumber;

      return $this;
    }

    public function getMobile(){
      return $this->field['mobilenumber'];
    }

    public function setEmail($email){
      $this->field['email'] = $email;

      return $this;

    }

    public function getEmail(){
      return $this->field['email'];
    }

    public function setAddress($address){
      $this->field['address'] = $address;

      return $this;
    }
  
    public function getAddress(){
      return $this->field['address'];
    }

    public function setArea($area){
      $this->field['area'] = $area;

      return $this;
    }

    public function getArea(){
      return $this->field['area'];
    }

    public function setPincode($pincode){
      $this->field['pincode'] = $pincode;

      return $this;
    }

    public function getPincode(){
      return $this->field['pincode'];
    }

    public function setCity($city){
      $this->field['city'] = $city;

      return $this;
    }

    public function getCity(){
      return $this->field['city'];
    }

    
    public function setState($state){
      $this->field['state'] = $state;

      return $this;
    }

    public function getState(){
      return $this->field['state'];
    }

    public function setGender($gender){
      $this->field['gender'] =  $gender;
  
      return $this;
    }

    public function getGender(){
      return $this->field['gender'];
    }

    public function setBirthDay($birthday){
      $this->field['birthday'] = $birthday;
    }

    public function getBirthDay(){
      return $this->field['birthday'];
    }

    public function setCountry($country){
      $this->field['country'] = $country;

      return $this;
    }

    public function getCountry(){
      return $this->field['country'];
    }

}

