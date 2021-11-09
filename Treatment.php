<?php
class Treatment{

  public $id;
  public $clientsName;
  public $clientsPhone;
  public $date;
  public $time;
  public $treatment_type;
  

  //definisemo konstruktor
  public function __construct($id=null, $clientsName=null, $clientsPhone=null, $ddate=null, $ttime=null, $treatment_type=null)
  
  {
      $this->id=$id;
      $this->clientsName=$clientsName;
      $this->clientsPhone=$clientsPhone;
      $this->date=$ddate;
      $this->time=$ttime;
      $this->treatment_type=$treatment_type;
    
  }

  public static function saveTreatment(Treatment $tr, mysqli $conn)
  {
    $query="INSERT INTO treatment(clientsName, clientsPhone, date, time,treatment_type )  VALUES ('$tr->clientsName', '$tr->clientsPhone', '$tr->date', '$tr->time','$tr->treatment_type');";
    return $conn->query($query);
  }
  public static function getAllTreatment( mysqli $conn, $column=null,$order='ASC')
  {
    if($column==null || $column==""){
    $query="select * from treatment;";}
    else{
   
      $query='select * from treatment ORDER BY '.  $column .' ' . $order;
    }
    return $conn->query($query);
  }

  public static function getTreatmentById( mysqli $conn, $id)
  {
  
      $query='select * from treatment where id='.$id;  
    
    return $conn->query($query);
  }


  public static function getByValue( $value, mysqli $conn, $column=null,$order='ASC')
  {
    $query="select * from treatment where clientsName Like '%".$value."%' or clientsPhone Like '%".$value."%' or date Like '%".$value."%' or time Like '%".$value."%' or treatment_type in (select id from treatment_type where name Like '%".$value."%')";
    return $conn->query($query);}

    public static function deleteTreatment(mysqli $conn, $id){
      $query="DELETE  FROM `treatment` WHERE id=".$id;
     
    return $conn->query($query);

    }

    public static function updateTreatment($conn,$id, $name, $phone, $date, $time, $ttype){
    $query="update `treatment` set clientsName='".$name."', clientsPhone='".$phone."', date='".$date."', time='".$time."', treatment_type=".$ttype." WHERE id=".$id;
     
    return $conn->query($query);
    

    }


  
  

}
