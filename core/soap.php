<?php

require_once(PLUGIN_PATH_BOCSY . '/lib/nusoap.php');
try {
  $wsdlurl = "http://dv.komput.net/test/bocsy.wsdl";
  $wsdl = new wsdl($wsdl, '', '', '', '', 0, 30, null, 0);
  $client = new nusoap_client($wsdlurl, 1, '', '', '', '', 10, 15,  'bocsy');
  $err = $client->getError();

if ($err) {
  echo '<h2>Construction error</h2><pre>' . $err . '</pre>';
} else {
  return $client;
}
} catch (Exception $e) {
  echo $e;
}
?>
