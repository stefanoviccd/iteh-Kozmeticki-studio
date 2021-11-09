<?php

class TreatmentType{
  public $id;
  public $name;
  public $price;

  //definisemo konstruktor
  public function __construct($id=null, $name=null, $price=null)
  
  {
      $this->id=$id;
      $this->name=$name;
      $this->price=$price;
    
  }

  public static function selectById($id, mysqli $conn){
    $query="select * from treatment_type where id=$id";
    return $conn->query($query);
  }
  public static function saveTreatmentType($tr, $conn){
    $query="insert into treatment_type (name, price) values ('$tr->name', '$tr->price' )";
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
public static function deleteTreatmentType(mysqli $conn, $ttype){
  $query="delete  from treatment_type where id=$ttype->id";
    return $conn->query($query);
}
public static function updateTreatmentType(mysqli $conn, $tr){
  $query="update treatment_type set name='$tr->name', price=$tr->price WHERE id=$tr->id";
    return $conn->query($query);
}



}
