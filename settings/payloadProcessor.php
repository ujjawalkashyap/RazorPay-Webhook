<?php

  class payload{

    public static $payload = NULL;

    public static function getpayload($as = "JSON"){
      if($as === "JSON"){
        $payload = file_get_contents("php://input");
        if(self::isJSON($payload))
          self::$payload = json_decode($payload, TRUE);
      }
    }

    private static function isJSON($string){
      json_decode($string);
      return (json_last_error() == JSON_ERROR_NONE);
    }
  }

  payload::getpayload();


 ?>
