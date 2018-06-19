<?php

  const ACCEPTED = 202;
  date_default_timezone_set('Asia/Calcutta');
  require_once("./settings/allfiles.php");

  if((new payloadManager())->manage()){
    http_response_code(ACCEPTED);
    connect::$conn->commit();
  }
  else saveWebhookData::save();
 ?>
