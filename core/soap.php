<?php

try {
$soap = new SoapClient("http://dv.komput.net/test/bocsy.wsdl", array('location'=>"http://dv.komput.net/test/bocsy.php"));
} catch (Exception $e) {
  echo $e;
}
?>
