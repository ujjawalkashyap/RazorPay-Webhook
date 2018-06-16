<?php

  class webhook_invoice{
    public $fields = ['webhook_invoice_id', 'webhook_id', 'id', 'receipt', 'entity',
     'customer_id', 'customer_name', 'customer_email', 'customer_contact', 'customer_address',
     'order_id', 'line_items', 'payment_id', 'status', 'issued_at', 'paid_at', 'sms_status',
      'email_status', 'date', 'terms', 'amount', 'currency',
       'shorts_url', 'view_less', 'type', 'created_at'];

    public $insertables = ['webhook_id', 'id', 'receipt', 'entity',
     'customer_id', 'customer_name', 'customer_email', 'customer_contact', 'customer_address',
     'order_id', 'line_items', 'payment_id', 'status', 'issued_at', 'paid_at', 'sms_status',
      'email_status', 'date', 'terms', 'amount', 'currency',
       'shorts_url', 'view_less', 'type', 'created_at'];

    public $table = 'webhook_invoice';

    protected function make_payload($payload){

      $invoiceData = $payload["payload"]["invoice"]["entity"];
      $newPayload = [];
      foreach ($this->insertables as $value)
        if(isset($invoiceData[$value])){
          $newPayload[$value] = (gettype($invoiceData[$value])==='array') ? json_encode($invoiceData[$value]) : $invoiceData[$value];
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
