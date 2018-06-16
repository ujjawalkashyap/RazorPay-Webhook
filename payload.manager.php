<?php

  class payloadManager{

    public function manage($payload = ''){
      $insert = (new webhook_primary())->insert(payload::$payload);
      payload::$payload = array_merge(['webhook_id' => connect::$conn->insert_id],payload::$payload);

      $data = payload::$payload;
      if(in_array('payment', $data['contains']))
      $insert = (new webhook_payment())->insert($data);
      if(in_array('subscription', $data['contains']))
      $insert = (new webhook_subscription())->insert($data);
      if(in_array('order', $data['contains']))
      $insert = (new webhook_order())->insert($data);
      if(in_array('invoice', $data['contains']))
      $insert = (new webhook_invoice())->insert($data);
      if(in_array('dispute', $data['contains']))
      $insert = (new webhook_dispute())->insert($data);
    }

  }



 ?>
