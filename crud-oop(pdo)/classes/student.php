<?php
include "DB.php";

  class student{
    private $table = 'tbl_student';
    private $name;
    private $dept;
    private $age;
    
      public function setName($name){
          $this->name=$name;
      }
      public function setDept($dept){
          $this->dept=$dept;
      }
      public function setAge($age){
          $this->age=$age;
      }
      public function insert(){
          $sql = "INSERT INTO $this->table(Name, Department, Age) VALUES (:Name, :Department, :Age)";
          $stmt = DB::prepare($sql);
          $stmt->bindParam(':Name', $this->name);
          $stmt->bindParam(':Department', $this->dept);
          $stmt->bindParam(':Age', $this->age);
          return $stmt->execute();
      }
      public function update($id){
          $sql = "UPDATE $this->table SET :Name, :Department, :Age WHERE Id=:Id";
          $stmt->bindParam(':Name', $this->name);
          $stmt->bindParam(':Department', $this->dept);
          $stmt->bindParam(':Age', $this->age);
          $stmt->bindParam(':Id', $id);
          return $stmt->execute();
      }
      
      public function readbyId($id){
          $sql = 'SELECT * FROM  $this->table WHERE Id=:Id';
          $stmt = DB::prepare($sql);
          $stmt->bindParam(':Id', $id);
          $stmt->execute();
          return $stmt->fetch();
      }
     
    
    public function readAll(){
        $sql = "SELECT * FROM $this->table";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function delete($id){
        $sql = "DELETE * FROM  $this->table WHERE id=:Id";
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':Id', $id);
        return $stmt->execute();
       }
  }




?>
