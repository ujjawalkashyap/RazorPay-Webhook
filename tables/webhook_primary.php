<?php
class webhook_primary {
  public $fields = ['webhook_id', 'event', 'full_data', 'created_ts' ];
  public $insertables = ['event', 'full_data', 'created_ts' ];
  public $table = 'webhook_primary';

  protected function validate_insert($payload){

  }

  protected function make_payload($payload){

    return [  'event'=>$payload['event'],
              'full_data'=>json_encode($payload),
              'created_ts'=>date('y-m-d h:i:s', $payload['created_at']) ];
  }

  public function insert($payload){
    $payload = self::make_payload($payload);
    $query = sqlHelper::insertQueryMaker($this->table, $payload, $this->insertables);
    return sqlHelper::insertData($query);
  }


}


?>
