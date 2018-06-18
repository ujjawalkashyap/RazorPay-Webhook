<?php

  class payloadManager{

    public function manage($payload = ''){
      $data;
      $insertStatus =TRUE ;

      $insert_webhook_primary = (new webhook_primary())->insert(payload::$payload);

      if($insert_webhook_primary){
          $data = array_merge(['webhook_id' => connect::$conn->insert_id], payload::$payload);
      }else return FALSE;

      if(isset($data['contains']) && in_array('payment', $data['contains'])){
        $insert_webhook_payment = (new webhook_payment())->insert($data);
        if($insert_webhook_payment) return FALSE;
      }

      if(isset($data['contains']) && in_array('subscription', $data['contains'])){
        $insert_webhook_subscription = (new webhook_subscription())->insert($data);
        if($insert_webhook_subscription) return FALSE;
      }

      if(isset($data['contains']) && in_array('order', $data['contains'])){
        $insert_webhook_order = (new webhook_order())->insert($data);
        if($insert_webhook_order) return FALSE;
      }

      if(isset($data['contains']) && in_array('invoice', $data['contains'])){
        $insert_webhook_invoice = (new webhook_invoice())->insert($data);
        if($insert_webhook_invoice) return FALSE;
      }

      if(isset($data['contains']) && in_array('dispute', $data['contains'])){
        $insert_webhook_dispute = (new webhook_dispute())->insert($data);
        if($insert_webhook_dispute) return FALSE;
      }

      return TRUE;
    }
  }

?>
