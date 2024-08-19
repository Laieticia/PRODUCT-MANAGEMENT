<?php
   require_once "Database.php";

   class Productdb{
   private $db;

   public function __construct()
   {
    $this->db = new Database();
   }  
   public function create($Name, $Price,  $Quantity, $Image, $CategoryId){
      $sql = "INSERT INTO Product SET Name=?,Price=?, Quantity=?,  Image=?, CategoryId=?";
      $datas = array($Name, $Price, $Quantity, $Image, $CategoryId);
      $this->db->prepareReq($sql, $datas);
   }
   public function readAll(){

      $sql = "SELECT * FROM Product ORDER BY Id DESC";
      $req = $this->db->prepareReq($sql);
      $datas = $this->db->recover($req);
      return $datas;
     }
     public function update($Id, $Name, $Price, $Quantity, $Image, $CategoryId ){
      $sql = "UPDATE Product SET Name=?, Price=?, Quantity=?, Image=?, CategoryId=? WHERE Id=? ";
      $datas = array($Name, $Price, $Quantity, $Image, $CategoryId, $Id);
      $this->db->prepareReq($sql, $datas);
}

   public function delete($Id)
   {
      $sql = "DELETE FROM Product WHERE Id=? ";
      $datas = array($Id);
      $this->db->prepareReq($sql, $datas);

   }
   public function read($Id){
      $sql = "SELECT * FROM Product WHERE Id=?";
      $datas= array($Id);
      $req = $this->db->prepareReq($sql,$datas);
      $data = $this->db->recover($req, true);
      return $data;

   }
   }


?>