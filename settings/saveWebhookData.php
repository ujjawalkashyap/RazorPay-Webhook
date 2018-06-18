<?php
class saveWebhookData{

  const TARGET_DIRECTORY ='dataAsTextFile';
  const NOT_ACCEPTABLE = 406;
  public static $ts;

  public static function save($filename = NULL){

    self::makeFailureDirectory();
    self::$ts = date('Y_m_d_h_i_s');
    self::saveAsText($filename);
  }

  private function makeFailureDirectory(){
    if(!is_dir(self::TARGET_DIRECTORY))
    mkdir(self::TARGET_DIRECTORY);
  }

  private function saveAsText($filename){
    if(gettype($filename) !== 'string' || strlen($filename) === 0){
      $filename = self::$ts;
    }
    
    $data = Payload::$payload;
    if ($data == NULL) $data = file_get_contents("php://input");

    if(file_exists(self::TARGET_DIRECTORY.'/'.$filename)){
      $filename = (string)rand(1,99999).$filename;
    }

    if(gettype($data)=='array') $data = json_encode($data);

    $myfile = fopen(self::TARGET_DIRECTORY.'/'.$filename,'w');
    fwrite($myfile, $data);
    http_response_code(self::NOT_ACCEPTABLE);
  }
}

?>
