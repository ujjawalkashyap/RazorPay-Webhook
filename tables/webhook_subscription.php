<?php

  class webhook_subscription{
    public $fields = ['webhook_subscription_id', 'webhook_id', 'id', 'entity', 'plan_id',
                      'customer_id', 'status', 'current_start', 'current_end', 'ended_at', 'quantity',
                      'notes', 'charge_at', 'start_at', 'end_at', 'auth_attempts', 'total_count',
                      'paid_count', 'customer_notify', 'created_at'];

    public $insertables = ['webhook_id', 'id', 'entity', 'plan_id',
                           'customer_id', 'status', 'current_start', 'current_end', 'ended_at', 'quantity',
                           'notes', 'charge_at', 'start_at', 'end_at', 'auth_attempts', 'total_count',
                           'paid_count', 'customer_notify', 'created_at'];

    public $table = 'webhook_subscription';

    protected function make_payload($payload){

      $subscriptionData = $payload["payload"]["subscription"]["entity"];
      $newPayload = [];
      foreach ($this->insertables as $value)
        if(isset($subscriptionData[$value]))
        $newPayload[$value] =
        (gettype($subscriptionData[$value])==='array') ? json_encode($subscriptionData[$value]) : $subscriptionData[$value];

      return array_merge(['webhook_id' => $payload['webhook_id']], $newPayload);
    }

    public function insert($payload){
      $payload = self::make_payload($payload);
      $query = sqlHelper::insertQueryMaker($this->table, $payload, $this->insertables);
      return sqlHelper::insertData($query);
    }

  }




 ?>
