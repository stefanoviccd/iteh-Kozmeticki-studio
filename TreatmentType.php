<?php

class TreatmentType{
  public $id;
  public $name;

  //definisemo konstruktor
  public function __construct($id=null, $name=null)
  
  {
      $this->id=$id;
      $this->name=$name;
    
  }

  public static function selectById($id, mysqli $conn){
    $query="select * from treatment_type where id=$id";
    return $conn->query($query);
  }
  public static function saveTreatmentType($tr, $conn){
    $query="insert into treatment_type (name) values ('$tr->name')";
    return $conn->query($query);

  }
  public static function getAllTypes( mysqli $conn, $column=null,$order='ASC')
  {
    if($column==null || $column==""){
    $query="select * from treatment_type;";}
    else{
      $query='select * from treatment_type ORDER BY ' .  $column . ' ' . $order;
    }
    return $conn->query($query);
  }

}

?>