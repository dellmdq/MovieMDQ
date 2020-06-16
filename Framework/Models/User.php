<?php
 namespace Models;

 class User

 {
     private $id;
     private $name;
     private $lastName;
     private $mail;
     private $password;
     private $listTicket;

     public function getMail(){
         return $this->mail;
     }

     public function setMail($mail){
         $this->mail=$mail;
     }

     public function getName()
     {
         return $this->name;
     }

     public function setName($name)
     {
         $this->name = $name;
     }

     public function getLastName(){
         return $this->lastName;
     }

     public function setLastName($lastName){
         $this->lastName=$lastName;
     }
     public function getId()
     {
         return $this->id;
     }

     public function setId($id)
     {
         $this->id = $id;
     }
     public function getPassword()
     {
         return $this->password;
     }

     public function setPassword($password)
     {
         $this->password = $password;
     }

     public function getListTicket(){
         return $this->listTicket;
     }

     public function setListTicket($listTicket){
         $this->listTicket=$listTicket;
     }

 }
?>