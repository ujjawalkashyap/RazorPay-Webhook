<?php

  class allFiles{

    const WEBHOOK_INVOICE = "./tables/webhook_invoice.php";
    const WEBHOOK_PAYMENT = "./tables/webhook_payment.php";
    const WEBHOOK_PRIMARY = "./tables/webhook_primary.php";
    const WEBHOOK_ORDER = "./tables/webhook_order.php";
    const WEBHOOK_SUBSCRIPTION = "./tables/webhook_subscription.php";
    const WEBHOOK_DISPUTE = "./tables/webhook_dispute.php";
    const PAYLOAD_MANAGER = "./payload.manager.php" ;
    const PAYLOADPROCESSOR = "payloadProcessor.php";
    const CONNECT = "connect.php";
    const SQLHELPER = "./tables/driver/sqlHelper.php";


    public static function requireAll(){
      require_once(self::CONNECT);
      require_once(self::SQLHELPER);
      require_once(self::WEBHOOK_INVOICE);
      require_once(self::WEBHOOK_PAYMENT);
      require_once(self::WEBHOOK_PRIMARY);
      require_once(self::WEBHOOK_ORDER);
      require_once(self::WEBHOOK_SUBSCRIPTION);
      require_once(self::WEBHOOK_DISPUTE);
      require_once(self::PAYLOAD_MANAGER);


    }

    public static function setData(){
      require_once(self::PAYLOADPROCESSOR);
      payload::getpayload();
    }
  }


allFiles::setData();
allFiles::requireAll();





 ?>
