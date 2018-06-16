<?php

  class webhook_payment{
    public $fields = ['webhook_id', 'id', 'amount', 'currency', 'status', 'email', 'contact', 'description', 'notes'];
    public $insertables = ['webhook_id', 'id', 'amount', 'currency', 'status', 'email', 'contact', 'description',
     'notes'];
    public $table = 'webhook_payment';

    protected function make_payload($payload){

      $paymentData = $payload["payload"]["payment"]["entity"];
      $newPayload = [];
      foreach ($this->insertables as $value)
        if(isset($paymentData[$value])){
          $newPayload[$value] = (gettype($paymentData[$value])==='array') ? json_encode($paymentData[$value]) : $paymentData[$value];
        }

      return array_merge(['webhook_id' => $payload['webhook_id']], $newPayload);
    }

    public function insert($payload){
      $payload = self::make_payload($payload);
      $query = sqlHelper::insertQueryMaker($this->table, $payload, $this->insertables);
      return sqlHelper::insertData($query);
    }

  }




 ?>
