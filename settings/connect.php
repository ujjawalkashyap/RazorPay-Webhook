<?php

      class connect{

        public static $user = 'user';
        public static $pass = '1234';
        public static $host = 'localhost';
        public static $db = 'webhook';
        public static $conn;

        public static function connectDb(){
          self::$conn = mysqli_connect(self::$host, self::$user, self::$pass, self::$db);
              if(!self::$conn) die();
        }
      }
      connect::connectDb();

 ?>
