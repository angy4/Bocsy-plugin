/*
 * <?php
 * For color syntax in vim
 */

require_once('../lib/nusoap.php');
try {
  $wsdl = "http://dv.komput.net/test/bocsy.wsdl";
  $client = new soapclient($wsdl, 'wsdl');
  $err = $client->getError();

if ($err) {
  echo '<h2>Construction error</h2><pre>' . $err . '</pre>';
} else {
  return $client;
}
} catch (Exception $e) {
  echo $e;
}

/*
 * ?>
 */
