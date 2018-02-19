<?php
  class User{
    public $name, $surname, $username, $password, $birthday;

    public function __construct($name, $surname, $username, $password, $birthday)
    {
      $this->name = $name;
      $this->surname = $surname;
      $this->username = $username;
      $this->password = password_hash($password, PASSWORD_DEFAULT);
      $this->birthday = $birthday;
    }
  }
 ?>
