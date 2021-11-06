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
    if($column==null){
    $query="select * from treatment;";}
    else{
      $query='select * from treatmentORDER BY ' .  $column . ' ' . $order;
    }
    return $conn->query($query);
  }
  public static function getByValue( $value, mysqli $conn)
  {
    $query="select * from treatment where clientsName Like '%".$value."%' or clientsPhone Like '%".$value."%' or date Like '%".$value."%' or time Like '%".$value."%' or treatment_type in (select id from treatment_type where name Like '%".$value."%') ;";
    return $conn->query($query);
  }


  

}

?>