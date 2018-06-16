<?php

class sqlHelper{

  public static function insertQueryMaker($table, $data, $insertables){
    $keys = $valuess = '';

    foreach ($data as $key => $value) {
      if(in_array($key, $insertables)){
          $keys .= ", `$key`";
          $valuess .= $value === NULL ?", NULL":", '$value'";
      }
    }

    $keys = trim($keys, ', ');
    $valuess = trim($valuess, ', ');

    return "INSERT INTO $table ($keys) VALUES ($valuess)";

  }

  public static function insertData($query){
    $result = mysqli_query(connect::$conn, $query);
    //TODO 1: check and return true and false!
    ($result) ? TRUE :FALSE;
  }

}


 ?>
