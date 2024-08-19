<?php
   require_once "Database.php";

   class Categorydb{
   private $db;

   public function __construct()
   {
    $this->db = new Database();
   }  
   public function create($Libelle,$Description)
   {
      $sql = "INSERT INTO category SET Libelle=?, Description=?";
      $datas = array($Libelle, $Description);
      $this->db->prepareReq($sql, $datas);

   }
   public function readAll(){

    $sql = "SELECT * FROM category ORDER BY Id DESC";
    $req = $this->db->prepareReq($sql);
    $datas = $this->db->recover($req);
    return $datas;
   }
   public function update($Id, $Libelle,$Description){
      $sql = "UPDATE category SET Libelle=?, Description=? WHERE Id=? ";
      $datas = array($Libelle, $Description,$Id);
      $this->db->prepareReq($sql, $datas);
}

   public function delete ($Id)
   {
      $sql = "DELETE FROM category WHERE Id=? ";
      $datas = array($Id);
      $this->db->prepareReq($sql, $datas);

   }
   public function read($Id){
      $sql = "SELECT * FROM category WHERE Id=?";
      $datas= array($Id);
      $req = $this->db->prepareReq($sql,$datas);
      $data = $this->db->recover($req, true);
      return $data;

   }

   }


?>