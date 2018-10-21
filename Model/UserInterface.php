<?php

namespace LeaveFormManagement\Model;

use LeaveFormManagement\Model\EntityInterface;

interface UserInterface extends EntityInterface{

  public function setId($id);
  public function getId();

  public function setPassword($password);
  public function getPassword();

  public function setname($fname);
  public function getName();

  public function setMobile($mbnumber);
  public function getMobile();

  public function setAddress($address);
  public function getAddress();

  public function setEmail($email);
  public function getEmail();

  public function setBirthday($day);
  public function getBirthday();

  public function setCountry($country);
  public function getCountry();

  public function setGender($gender);
  public function getGender();

  public function setState($state);
  public function getState();

  public function setArea($area);
  public function getArea();

  public function setCity($city);
  public function getCity();

  public function setPincode($pincode);
  public function getPincode();

}

