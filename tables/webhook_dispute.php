<?php

  class webhook_dispute{
    public $fields = ['webhook_dispute_id', 'webhook_id', 'id', 'entity', 'payment_id',
     'amount', 'amount_deducted', 'currency', 'gateway_dispute_id', 'reason_code',
      'respond_by', 'status', 'phase', 'created_at'];

    public $insertables = ['webhook_id', 'id', 'entity', 'payment_id',
     'amount', 'amount_deducted', 'currency', 'gateway_dispute_id', 'reason_code',
      'respond_by', 'status', 'phase', 'created_at'];

    public $table = 'webhook_dispute';

    protected function make_payload($payload){
      $disputeData = $payload["payload"]["dispute"]["entity"];

      $newPayload = [];
      foreach ($this->insertables as $value)
        if(isset($disputeData[$value])){
          $newPayload[$value] = (gettype($disputeData[$value])==='array') ? json_encode($disputeData[$value]) : $disputeData[$value];
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
