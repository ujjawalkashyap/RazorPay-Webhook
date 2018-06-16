<?php

  class webhook_order{
    public $fields = ['webhook_order_id', 'webhook_id', 'id', 'entity', 'amount', 'currency',
     'receipt', 'status', 'method', 'order_id', 'card_id', 'bank', 'captured', 'email',
      'contact', 'description', 'error_code', 'error_description', 'fee', 'service_tax',
       'international', 'vpa', 'wallet', 'attempts', 'created_at'];

    public $insertables = ['webhook_id', 'id', 'entity', 'amount', 'currency',
     'receipt', 'status', 'method', 'order_id', 'card_id', 'bank', 'captured', 'email',
      'contact', 'description', 'error_code', 'error_description', 'fee', 'service_tax',
       'international', 'vpa', 'wallet', 'attempts', 'created_at'];

    public $table = 'webhook_order';

    protected function make_payload($payload){

      $orderData = $payload["payload"]["order"]["entity"];
      $newPayload = [];
      foreach ($this->insertables as $value)
        if(isset($orderData[$value])){
          $newPayload[$value] = (gettype($orderData[$value])==='array') ? json_encode($orderData[$value]) : $orderData[$value];
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
