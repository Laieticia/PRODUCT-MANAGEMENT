<?php
   require_once "Database.php";

   class Usersdb{
   private $db;

   public function __construct()
   {
    $this->db = new Database();
   }  
   public function create($Name, $Surname,  $Telephone, $login, $Password, $Email, $Role){
      $sql = "INSERT INTO users SET Name=?,Surname=?, Telephone=?,  login=?, Password=? , Email=?, Role=?";
      $datas = array($Name, $Surname, $Telephone, $login, $Password, $Email, $Role);
      $this->db->prepareReq($sql, $datas);
   }
   public function readAll(){

      $sql = "SELECT * FROM users ORDER BY Id DESC";
      $req = $this->db->prepareReq($sql);
      $datas = $this->db->recover($req);
      return $datas;
     }
     public function readCompte($login, $Password){
        $sql = "select * from users  WHERE login=? and Password=? ";
        $attributes = array($login, $Password);
        $req=$this->db->prepareReq($sql, $attributes);
        $data=$this->db->recover( $req,true);
        return $data;

     }
     public function update ($Id, $Name,$Surname, $Telephone, $login, $Password){
      $sql = "UPDATE users SET Name=?, Surname=?, Telephone=?, login=?, Password=?, Email=?,Role=? WHERE Id=? ";
      $datas = array($Name, $Surname, $Telephone, $login, $Password, $Id);
      $this->db->prepareReq($sql, $datas);
}

   public function delete ($Id)
   {
      $sql = "DELETE FROM users WHERE Id=? ";
      $datas = array($Id);
      $this->db->prepareReq($sql, $datas);

   }
   public function read($Id){
      $sql = "SELECT * FROM users WHERE Id=?";
      $datas= array($Id);
      $req = $this->db->prepareReq($sql,$datas);
      $data = $this->db->recover($req, true);
      return $data;

   }
   }


?>